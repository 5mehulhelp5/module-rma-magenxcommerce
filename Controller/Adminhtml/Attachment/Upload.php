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

use Magenx\Rma\Controller\Adminhtml\Rma as BaseController;
use Magenx\Rma\Service\AttachmentService;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Exception;

class Upload extends BaseController implements HttpPostActionInterface
{
    /**
     * @param Context $context
     * @param JsonFactory $jsonFactory
     * @param AttachmentService $attachmentService
     */
    public function __construct(
        Context $context,
        protected readonly JsonFactory $jsonFactory,
        protected readonly AttachmentService $attachmentService
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface
     */
    public function execute(): ResultInterface
    {
        $result = $this->jsonFactory->create();

        try {
            $fileData = $this->attachmentService->uploadToTmp('attachment');
            return $result->setData(['success' => true, 'file' => $fileData]);
        } catch (Exception $e) {
            return $result->setData(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
