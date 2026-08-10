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

namespace Magenx\Rma\Api;

use Magenx\Rma\Api\Data\ItemInterface;
use Magenx\Rma\Api\Data\ItemSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface ItemRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\ItemInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): ItemInterface;

    /**
     * @param ItemInterface $item
     * @return \Magenx\Rma\Api\Data\ItemInterface
     * @throws CouldNotSaveException
     */
    public function save(ItemInterface $item): ItemInterface;

    /**
     * @param ItemInterface $item
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ItemInterface $item): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\ItemSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ItemSearchResultsInterface;
}
