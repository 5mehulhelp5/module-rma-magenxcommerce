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

namespace Magenx\Rma\Controller\Adminhtml\Rma;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magenx\Rma\Api\RMARepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\Rma as BaseController;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Exception;

class Delete extends BaseController implements HttpPostActionInterface
{
    /**
     * @param Context $context
     * @param RMARepositoryInterface $rmaRepository
     */
    public function __construct(
        Context $context,
        protected readonly RMARepositoryInterface $rmaRepository
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface|ResponseInterface|Redirect
     */
    public function execute(): ResultInterface|ResponseInterface|Redirect
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = (int)$this->getRequest()->getParam('entity_id');

        if (!$id) {
            $this->messageManager->addErrorMessage(__('We can\'t find an RMA request to delete.'));
            return $resultRedirect->setPath('*/*/');
        }

        try {
            $rma = $this->rmaRepository->get($id);
            $this->rmaRepository->delete($rma);
            $this->messageManager->addSuccessMessage(__('You deleted the RMA request.'));
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            return $resultRedirect->setPath('*/*/edit', ['entity_id' => $id]);
        }

        return $resultRedirect->setPath('*/*/');
    }
}
