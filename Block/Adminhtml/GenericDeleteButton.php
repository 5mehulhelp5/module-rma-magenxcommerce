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

namespace Magenx\Rma\Block\Adminhtml;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class GenericDeleteButton implements ButtonProviderInterface
{
    /**
     * @param Context $context
     * @param string $confirmMessage
     */
    public function __construct(
        protected readonly Context $context,
        protected readonly string $confirmMessage = 'Are you sure you want to delete this?'
    ) {
    }

    /**
     * @return array
     */
    public function getButtonData(): array
    {
        $entityId = (int)$this->context->getRequest()->getParam('entity_id');

        if (!$entityId) {
            return [];
        }

        return [
            'label' => __('Delete'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __($this->confirmMessage)
                . '\', \''
                . $this->context->getUrlBuilder()->getUrl('*/*/delete', ['entity_id' => $entityId])
                . '\', {data: {}})',
            'sort_order' => 20,
        ];
    }
}
