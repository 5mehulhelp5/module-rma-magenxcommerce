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
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Exception;

class SendStatusChangeEmail implements ObserverInterface
{
    /**
     * @param SenderInterface $sender
     * @param LoggerInterface $logger
     */
    public function __construct(
        protected readonly SenderInterface $sender,
        protected readonly LoggerInterface $logger
    ) {
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $rma = $observer->getData('rma');

        if (!$rma instanceof RMAInterface) {
            return;
        }

        try {
            $this->sender->sendCustomerStatusChangeEmail($rma, (int)$observer->getData('new_status_id'));
        } catch (Exception $e) {
            $this->logger->error('RMA: Failed to send status change email', [
                'rma_id' => $rma->getEntityId(),
                'error' => $e->getMessage(),
            ]);
        }
    }
}
