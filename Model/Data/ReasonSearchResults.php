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

use Magenx\Rma\Api\Data\ReasonInterface;
use Magenx\Rma\Api\Data\ReasonSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

class ReasonSearchResults extends SearchResults implements ReasonSearchResultsInterface
{
    /**
     * @return ReasonInterface[]
     */
    public function getItems(): array
    {
        return parent::getItems();
    }

    /**
     * @param ReasonInterface[] $items
     * @return $this
     */
    public function setItems(array $items): self
    {
        parent::setItems($items);

        return $this;
    }
}