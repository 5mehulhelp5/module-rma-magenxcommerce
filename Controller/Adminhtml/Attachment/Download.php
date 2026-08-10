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

namespace Magenx\Rma\Controller\Adminhtml\Attachment;

use Magenx\Rma\Api\AttachmentRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\Rma as BaseController;
use Magenx\Rma\Service\AttachmentService;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Exception;

class Download extends BaseController implements HttpGetActionInterface
{
    /**
     * @param Context $context
     * @param FileFactory $fileFactory
     * @param AttachmentRepositoryInterface $attachmentRepository
     * @param AttachmentService $attachmentService
     */
    public function __construct(
        Context $context,
        protected readonly FileFactory $fileFactory,
        protected readonly AttachmentRepositoryInterface $attachmentRepository,
        protected readonly AttachmentService $attachmentService
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface|ResponseInterface
     */
    public function execute(): ResultInterface|ResponseInterface
    {
        try {
            $attachment = $this->attachmentRepository->get((int)$this->getRequest()->getParam('id'));
            return $this->attachmentService->createDownloadResponse($attachment, $this->fileFactory);
        } catch (NoSuchEntityException) {
            $this->messageManager->addErrorMessage(__('Attachment not found.'));
        } catch (Exception) {
            $this->messageManager->addErrorMessage(__('Could not download the file.'));
        }

        return $this->resultRedirectFactory->create()->setPath('rma/rma/index');
    }
}
