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

namespace Magenx\Rma\Model\Reason;

use Magenx\Rma\Model\ResourceModel\Reason as ReasonResource;
use Magenx\Rma\Model\ResourceModel\Reason\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Ui\DataProvider\ModifierPoolDataProvider;

class DataProvider extends ModifierPoolDataProvider
{
    /**
     * @var array|null
     */
    protected ?array $loadedData = null;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param RequestInterface $request
     * @param ReasonResource $reasonResource
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $collectionFactory,
        protected readonly DataPersistorInterface $dataPersistor,
        protected readonly RequestInterface $request,
        protected readonly ReasonResource $reasonResource,
        array $meta = [],
        array $data = [],
        ?PoolInterface $pool = null
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        if ($this->loadedData !== null) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach ($items as $reason) {
            $data = $reason->getData();
            $data['store_labels'] = $this->reasonResource->getStoreLabels($reason);
            $this->loadedData[$reason->getId()] = $data;
        }

        $data = $this->dataPersistor->get('rma_reason');
        if (!empty($data)) {
            $reason = $this->collection->getNewEmptyItem();
            $reason->setData($data);
            $this->loadedData[(int) $reason->getId()] = $reason->getData();
            $this->dataPersistor->clear('rma_reason');
        }

        return $this->loadedData;
    }

    /**
     * @return array
     */
    public function getMeta(): array
    {
        $meta = parent::getMeta();

        $meta['general']['children']['code']['arguments']['data']['config']['disabled'] =
            (bool)$this->request->getParam('entity_id');

        return $meta;
    }
}
