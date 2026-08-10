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

namespace Magenx\Rma\Controller\Adminhtml\Order;

use Magento\Sales\Api\Data\OrderInterface;

trait OrderOptionFormatter
{
    /**
     * @param OrderInterface $order
     * @return array
     */
    protected function formatOrderOption(OrderInterface $order): array
    {
        return [
            'value' => (string)$order->getEntityId(),
            'label' => sprintf(
                '#%s — %s (%s)',
                $order->getIncrementId(),
                $order->getCustomerName() ?: __('Guest'),
                $order->getCustomerEmail()
            ),
            'path' => '',
            'order_id' => (int)$order->getEntityId(),
            'increment_id' => $order->getIncrementId(),
            'customer_id' => $order->getCustomerId() ? (int)$order->getCustomerId() : null,
            'customer_name' => $order->getCustomerName() ?: (string)__('Guest'),
            'customer_email' => $order->getCustomerEmail(),
            'store_id' => (int)$order->getStoreId(),
            'optgroup' => false,
        ];
    }
}
