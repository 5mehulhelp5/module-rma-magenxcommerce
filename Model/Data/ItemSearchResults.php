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

namespace Magenx\Rma\Model\Data;

use Magenx\Rma\Api\Data\ItemInterface;
use Magenx\Rma\Api\Data\ItemSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

class ItemSearchResults extends SearchResults implements ItemSearchResultsInterface
{
    /**
     * @return ItemInterface[]
     */
    public function getItems(): array
    {
        return parent::getItems();
    }

    /**
     * @param ItemInterface[] $items
     * @return $this
     */
    public function setItems(array $items): self
    {
        parent::setItems($items);

        return $this;
    }
}