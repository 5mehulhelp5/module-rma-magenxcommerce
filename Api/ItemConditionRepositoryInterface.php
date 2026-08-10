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

use Magenx\Rma\Api\Data\ItemConditionInterface;
use Magenx\Rma\Api\Data\ItemConditionSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface ItemConditionRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\ItemConditionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): ItemConditionInterface;

    /**
     * @param ItemConditionInterface $itemCondition
     * @return \Magenx\Rma\Api\Data\ItemConditionInterface
     * @throws CouldNotSaveException
     */
    public function save(ItemConditionInterface $itemCondition): ItemConditionInterface;

    /**
     * @param ItemConditionInterface $itemCondition
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ItemConditionInterface $itemCondition): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\ItemConditionSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ItemConditionSearchResultsInterface;
}
