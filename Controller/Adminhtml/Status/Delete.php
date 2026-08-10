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

use Magenx\Rma\Api\StatusRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\AbstractLookupDelete;
use Magenx\Rma\Model\RMA\StatusCodes;
use Magento\Backend\App\Action\Context;

class Delete extends AbstractLookupDelete
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_status';

    /**
     * @param Context $context
     * @param StatusRepositoryInterface $statusRepository
     */
    public function __construct(
        Context $context,
        StatusRepositoryInterface $statusRepository
    ) {
        parent::__construct($context, $statusRepository, 'status');
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
     * @param object $entity
     * @return string
     */
    protected function getProtectedMessage(object $entity): string
    {
        return (string)__('The status "%1" is used by the system and cannot be deleted.', $entity->getLabel());
    }
}
