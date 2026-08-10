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

namespace Magenx\Rma\Block\Adminhtml\Status\Edit;

use Magenx\Rma\Api\StatusRepositoryInterface;
use Magenx\Rma\Block\Adminhtml\GenericDeleteButton;
use Magenx\Rma\Model\RMA\StatusCodes;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

class DeleteButton extends GenericDeleteButton
{
    /**
     * @param Context $context
     * @param StatusRepositoryInterface $statusRepository
     * @param string $confirmMessage
     */
    public function __construct(
        Context $context,
        protected readonly StatusRepositoryInterface $statusRepository,
        string $confirmMessage = 'Are you sure you want to delete this status?'
    ) {
        parent::__construct($context, $confirmMessage);
    }

    /**
     * @return array
     */
    public function getButtonData(): array
    {
        if ($this->isProtectedStatus()) {
            return [];
        }

        return parent::getButtonData();
    }

    /**
     * @return bool
     */
    protected function isProtectedStatus(): bool
    {
        $entityId = (int)$this->context->getRequest()->getParam('entity_id');

        if (!$entityId) {
            return false;
        }

        try {
            $status = $this->statusRepository->get($entityId);

            return StatusCodes::isProtected($status->getCode());
        } catch (NoSuchEntityException) {
            return false;
        }
    }
}
