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

namespace Magenx\Rma\Controller\Adminhtml;

abstract class ItemCondition extends AbstractLookupController
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_item_condition';

    /**
     * @return string
     */
    protected function getMenuId(): string
    {
        return 'Magenx_Rma::rma_item_condition';
    }

    /**
     * @return string
     */
    protected function getBreadcrumbLabel(): string
    {
        return 'Item Conditions';
    }
}
