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

namespace Magenx\Rma\Controller\Adminhtml\Reason;

use Magenx\Rma\Api\ReasonRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\AbstractLookupSave;
use Magenx\Rma\Model\ReasonFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends AbstractLookupSave
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_reason';

    /**
     * @param Context $context
     * @param ReasonRepositoryInterface $reasonRepository
     * @param ReasonFactory $reasonFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        ReasonRepositoryInterface $reasonRepository,
        ReasonFactory $reasonFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context, $reasonRepository, $reasonFactory, $dataPersistor, 'reason', 'rma_reason');
    }
}
