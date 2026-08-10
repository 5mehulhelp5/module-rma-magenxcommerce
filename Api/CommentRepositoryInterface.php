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

use Magenx\Rma\Api\Data\CommentInterface;
use Magenx\Rma\Api\Data\CommentSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface CommentRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\CommentInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): CommentInterface;

    /**
     * @param CommentInterface $comment
     * @return \Magenx\Rma\Api\Data\CommentInterface
     * @throws CouldNotSaveException
     */
    public function save(CommentInterface $comment): CommentInterface;

    /**
     * @param CommentInterface $comment
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CommentInterface $comment): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\CommentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): CommentSearchResultsInterface;
}
