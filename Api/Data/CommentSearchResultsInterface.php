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

namespace Magenx\Rma\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Magenx\Rma\Api\Data\CommentInterface[]
     */
    public function getItems(): array;

    /**
     * @param \Magenx\Rma\Api\Data\CommentInterface[] $items
     * @return $this
     */
    public function setItems(array $items): self;
}
