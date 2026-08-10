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

use Magenx\Rma\Api\Data\AttachmentInterface;
use Magenx\Rma\Api\Data\AttachmentSearchResultsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * @api
 */
interface AttachmentRepositoryInterface
{
    /**
     * @param int $entityId
     * @return \Magenx\Rma\Api\Data\AttachmentInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): AttachmentInterface;

    /**
     * @param AttachmentInterface $attachment
     * @return \Magenx\Rma\Api\Data\AttachmentInterface
     * @throws CouldNotSaveException
     */
    public function save(AttachmentInterface $attachment): AttachmentInterface;

    /**
     * @param AttachmentInterface $attachment
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(AttachmentInterface $attachment): bool;

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magenx\Rma\Api\Data\AttachmentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): AttachmentSearchResultsInterface;
}
