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
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface RmaCommentManagementInterface
{
    /**
     * @param int $rmaId
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\CommentSearchResultsInterface
     * @throws NoSuchEntityException
     */
    public function getList(int $rmaId, SearchCriteriaInterface $searchCriteria): CommentSearchResultsInterface;

    /**
     * @param int $rmaId
     * @param CommentInterface $comment
     * @return \Magenx\Rma\Api\Data\CommentInterface
     * @throws NoSuchEntityException
     * @throws CouldNotSaveException
     * @throws LocalizedException
     */
    public function save(int $rmaId, CommentInterface $comment): CommentInterface;
}
