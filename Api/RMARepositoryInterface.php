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

use Magenx\Rma\Api\Data\RMAInterface;
use Magenx\Rma\Api\Data\RMASearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface RMARepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\RMAInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): RMAInterface;

    /**
     * @param string $incrementId
     * @return \Magenx\Rma\Api\Data\RMAInterface
     * @throws NoSuchEntityException
     */
    public function getByIncrementId(string $incrementId): RMAInterface;

    /**
     * @param RMAInterface $rma
     * @return \Magenx\Rma\Api\Data\RMAInterface
     * @throws CouldNotSaveException
     */
    public function save(RMAInterface $rma): RMAInterface;

    /**
     * @param RMAInterface $rma
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(RMAInterface $rma): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\RMASearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): RMASearchResultsInterface;
}
