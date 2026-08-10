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

use Magenx\Rma\Api\Data\ResolutionTypeInterface;
use Magenx\Rma\Api\Data\ResolutionTypeSearchResultsInterface;
use Magenx\Rma\Api\Data\ResolutionTypeSearchResultsInterfaceFactory;
use Magenx\Rma\Api\ResolutionTypeRepositoryInterface;
use Magenx\Rma\Model\ResourceModel\ResolutionType as ResourceModel;
use Magenx\Rma\Model\ResourceModel\ResolutionType\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class ResolutionTypeRepository extends AbstractRepository implements ResolutionTypeRepositoryInterface
{
    /**
     * @param ResourceModel $resourceModel
     * @param ResolutionTypeFactory $resolutionTypeFactory
     * @param CollectionFactory $collectionFactory
     * @param ResolutionTypeSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceModel $resourceModel,
        protected readonly ResolutionTypeFactory $resolutionTypeFactory,
        protected readonly CollectionFactory $collectionFactory,
        protected readonly ResolutionTypeSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        parent::__construct($resourceModel, $collectionProcessor);
    }

    /**
     * @return string
     */
    protected function getEntityLabel(): string
    {
        return 'RMA Resolution Type';
    }

    /**
     * @return AbstractModel
     */
    protected function createEntity(): AbstractModel
    {
        return $this->resolutionTypeFactory->create();
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
     * @return ResolutionTypeInterface
     * @throws NoSuchEntityException
     */
    public function get(int $entityId): ResolutionTypeInterface
    {
        return $this->loadEntity($entityId);
    }

    /**
     * @param ResolutionTypeInterface $resolutionType
     * @return ResolutionTypeInterface
     * @throws CouldNotSaveException
     */
    public function save(ResolutionTypeInterface $resolutionType): ResolutionTypeInterface
    {
        return $this->saveEntity($resolutionType);
    }

    /**
     * @param ResolutionTypeInterface $resolutionType
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(ResolutionTypeInterface $resolutionType): bool
    {
        return $this->deleteEntity($resolutionType);
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
     * @return ResolutionTypeSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): ResolutionTypeSearchResultsInterface
    {
        return $this->performGetList($searchCriteria);
    }
}
