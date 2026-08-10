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

namespace Magenx\Rma\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Sales\Model\Order\Config as OrderConfig;

class OrderStatuses implements OptionSourceInterface
{
    /**
     * @param OrderConfig $orderConfig
     */
    public function __construct(
        protected readonly OrderConfig $orderConfig
    ) {
    }

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];

        foreach ($this->orderConfig->getStatuses() as $code => $label) {
            $options[] = [
                'value' => $code,
                'label' => $label,
            ];
        }

        return $options;
    }
}
