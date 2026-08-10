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

namespace Magenx\Rma\Controller\Adminhtml\Status;

use Magenx\Rma\Api\StatusRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\AbstractLookupSave;
use Magenx\Rma\Model\StatusFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends AbstractLookupSave
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_status';

    /**
     * @param Context $context
     * @param StatusRepositoryInterface $statusRepository
     * @param StatusFactory $statusFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        StatusRepositoryInterface $statusRepository,
        StatusFactory $statusFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context, $statusRepository, $statusFactory, $dataPersistor, 'status', 'rma_status');
    }

    /**
     * @return string[]
     */
    protected function getImmutableFields(): array
    {
        return ['code'];
    }
}
