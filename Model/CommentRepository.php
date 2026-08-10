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

namespace Magenx\Rma\Model;

use Magenx\Rma\Api\CommentRepositoryInterface;
use Magenx\Rma\Api\Data\CommentInterface;
use Magenx\Rma\Api\Data\CommentSearchResultsInterface;
use Magenx\Rma\Api\Data\CommentSearchResultsInterfaceFactory;
use Magenx\Rma\Model\ResourceModel\Comment as ResourceModel;
use Magenx\Rma\Model\ResourceModel\Comment\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class CommentRepository extends AbstractRepository implements CommentRepositoryInterface
{
    /**
     * @param ResourceModel $resourceModel
     * @param CommentFactory $commentFactory
     * @param CollectionFactory $collectionFactory
     * @param CommentSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceModel $resourceModel,
        protected readonly CommentFactory $commentFactory,
        protected readonly CollectionFactory $collectionFactory,
        protected readonly CommentSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        parent::__construct($resourceModel, $collectionProcessor);
    }

    /**
     * @return string
     */
    protected function getEntityLabel(): string
    {
        return 'RMA Comment';
    }

    /**
     * @return AbstractModel
     */
    protected function createEntity(): AbstractModel
    {
        return $this->commentFactory->create();
    }

    /**
     * @return AbstractCollection
     */
    protected function createCollection(): AbstractCollection
    {
        return $this->collectionFactory->create();
    }

    /**
     * @return SearchResultsInterface
     */
    protected function createSearchResults(): SearchResultsInterface
    {
        return $this->searchResultsFactory->create();
    }

    /**
     * @param int $entityId
     * @return CommentInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): CommentInterface
    {
        return $this->loadEntity($entityId);
    }

    /**
     * @param CommentInterface $comment
     * @return CommentInterface
     * @throws CouldNotSaveException
     */
    public function save(CommentInterface $comment): CommentInterface
    {
        return $this->saveEntity($comment);
    }

    /**
     * @param CommentInterface $comment
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CommentInterface $comment): bool
    {
        return $this->deleteEntity($comment);
    }

    /**
     * @param int $entityId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $entityId): bool
    {
        return $this->delete($this->get($entityId));
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return CommentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): CommentSearchResultsInterface
    {
        return $this->performGetList($searchCriteria);
    }
}
