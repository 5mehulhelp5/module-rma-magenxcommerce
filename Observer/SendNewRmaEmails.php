<?php
/**
 * Mage-OS
 * Copyright (c) Mage-OS Association (https://mage-os.org/)
 * SPDX-License-Identifier: MIT
 *
 * Forked from mage-os/module-rma 2.4.1 into Magenx_Rma / Magenx_RmaGraphQl;
 * identifiers renamed, GraphQL surface split into a sibling module.
 */
declare(strict_types=1);

namespace Magenx\Rma\Observer;

use Magenx\Rma\Api\Data\RMAInterface;
use Magenx\Rma\Api\Email\SenderInterface;
use Magenx\Rma\Helper\ModuleConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Exception;

class SendNewRmaEmails implements ObserverInterface
{
    /**
     * @param SenderInterface $sender
     * @param ModuleConfig $moduleConfig
     * @param LoggerInterface $logger
     */
    public function __construct(
        protected readonly SenderInterface $sender,
        protected readonly ModuleConfig $moduleConfig,
        protected readonly LoggerInterface $logger
    ) {
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        /** @var RMAInterface $rma */
        $rma = $observer->getData('rma');

        if (!$rma instanceof RMAInterface) {
            return;
        }

        if (!$this->moduleConfig->isEnabled((int)$rma->getStoreId())) {
            return;
        }

        if (!$rma->getData('is_new')) {
            return;
        }

        try {
            $this->sender->sendCustomerNewRmaEmail($rma);
        } catch (Exception $e) {
            $this->logger->error('RMA: Failed to send customer new RMA email', [
                'rma_id' => $rma->getEntityId(),
                'error' => $e->getMessage(),
            ]);
        }

        try {
            $this->sender->sendAdminNewRmaEmail($rma);
        } catch (Exception $e) {
            $this->logger->error('RMA: Failed to send admin new RMA email', [
                'rma_id' => $rma->getEntityId(),
                'error' => $e->getMessage(),
            ]);
        }
    }
}
