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

namespace Magenx\Rma\Controller\Adminhtml\ItemCondition;

use Magenx\Rma\Api\ItemConditionRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\AbstractLookupSave;
use Magenx\Rma\Model\ItemConditionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends AbstractLookupSave
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_item_condition';

    /**
     * @param Context $context
     * @param ItemConditionRepositoryInterface $itemConditionRepository
     * @param ItemConditionFactory $itemConditionFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        ItemConditionRepositoryInterface $itemConditionRepository,
        ItemConditionFactory $itemConditionFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct(
            $context,
            $itemConditionRepository,
            $itemConditionFactory,
            $dataPersistor,
            'item condition',
            'rma_item_condition'
        );
    }
}
