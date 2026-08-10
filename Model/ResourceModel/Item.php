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

namespace Magenx\Rma\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Item extends AbstractDb
{
    /**
     * @var string
     */
    protected string $_eventPrefix = 'rma_item_resource_model';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init('rma_item', 'entity_id');
        $this->_useIsObjectNew = true;
    }
}
