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
use Magenx\Rma\Controller\Adminhtml\AbstractLookupInlineEdit;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends AbstractLookupInlineEdit
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_item_condition';

    /**
     * @param Context $context
     * @param ItemConditionRepositoryInterface $itemConditionRepository
     * @param JsonFactory $jsonFactory
     */
    public function __construct(
        Context $context,
        ItemConditionRepositoryInterface $itemConditionRepository,
        JsonFactory $jsonFactory
    ) {
        parent::__construct($context, $itemConditionRepository, $jsonFactory, 'Item Condition');
    }
}
