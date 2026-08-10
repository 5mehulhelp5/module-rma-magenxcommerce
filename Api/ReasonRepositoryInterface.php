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

use Magenx\Rma\Api\Data\ReasonInterface;
use Magenx\Rma\Api\Data\ReasonSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface ReasonRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\ReasonInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): ReasonInterface;

    /**
     * @param ReasonInterface $reason
     * @return \Magenx\Rma\Api\Data\ReasonInterface
     * @throws CouldNotSaveException
     */
    public function save(ReasonInterface $reason): ReasonInterface;

    /**
     * @param ReasonInterface $reason
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ReasonInterface $reason): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\ReasonSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ReasonSearchResultsInterface;
}
