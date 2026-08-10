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

namespace Magenx\Rma\Controller\Adminhtml\Status;

use Magenx\Rma\Controller\Adminhtml\AbstractLookupMassDelete;
use Magenx\Rma\Model\RMA\StatusCodes;
use Magenx\Rma\Model\ResourceModel\Status\CollectionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends AbstractLookupMassDelete
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_status';

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        parent::__construct($context, $filter, $collectionFactory, 'status');
    }

    /**
     * @param object $entity
     * @return bool
     */
    protected function isProtected(object $entity): bool
    {
        return StatusCodes::isProtected($entity->getCode());
    }

    /**
     * @param int $count
     * @return string
     */
    protected function getProtectedSkippedMessage(int $count): string
    {
        return (string)__('%1 status(es) are used by the system and cannot be deleted.', $count);
    }
}
