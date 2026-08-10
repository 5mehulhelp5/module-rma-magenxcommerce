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

namespace Magenx\Rma\Model\Config\Source;

use Magenx\Rma\Model\ResourceModel\ResolutionType\CollectionFactory;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Store\Model\StoreManagerInterface;

class ResolutionType extends AbstractLookupSource
{
    /**
     * @param CollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        protected readonly CollectionFactory $collectionFactory,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($storeManager);
    }

    /**
     * @return AbstractCollection
     */
    protected function createCollection(): AbstractCollection
    {
        return $this->collectionFactory->create();
    }

    /**
     * @return string
     */
    protected function getLabelTable(): string
    {
        return 'rma_resolution_type_label';
    }

    /**
     * @return string
     */
    protected function getLabelForeignKey(): string
    {
        return 'resolution_type_id';
    }
}
