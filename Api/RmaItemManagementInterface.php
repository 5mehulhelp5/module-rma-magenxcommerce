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
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface RmaItemManagementInterface
{
    /**
     * @param int $rmaId
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\ItemSearchResultsInterface
     * @throws NoSuchEntityException
     */
    public function getList(int $rmaId, SearchCriteriaInterface $searchCriteria): ItemSearchResultsInterface;

    /**
     * @param int $rmaId
     * @param ItemInterface $item
     * @return \Magenx\Rma\Api\Data\ItemInterface
     * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     * @throws LocalizedException
     */
    public function save(int $rmaId, ItemInterface $item): ItemInterface;

    /**
     * @param int $rmaId
     * @param int $itemId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     * @throws LocalizedException
     */
    public function deleteById(int $rmaId, int $itemId): bool;
}
