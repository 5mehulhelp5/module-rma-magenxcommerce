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

use Magenx\Rma\Api\Data\StatusInterface;
use Magenx\Rma\Api\Data\StatusSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface StatusRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\StatusInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): StatusInterface;

    /**
     * @param StatusInterface $status
     * @return \Magenx\Rma\Api\Data\StatusInterface
     * @throws CouldNotSaveException
     */
    public function save(StatusInterface $status): StatusInterface;

    /**
     * @param StatusInterface $status
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(StatusInterface $status): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\StatusSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): StatusSearchResultsInterface;
}
