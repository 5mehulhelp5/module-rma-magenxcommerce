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

use Magenx\Rma\Controller\Adminhtml\Rma as BaseController;
use Magenx\Rma\Model\ResourceModel\RMA\CollectionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Exception\LocalizedException;
use Exception;

class MassDelete extends BaseController implements HttpPostActionInterface
{
    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        protected readonly Filter $filter,
        protected readonly CollectionFactory $collectionFactory
    ) {
        parent::__construct($context);
    }

    /**
     * @return ResultInterface|ResponseInterface|Redirect
     * @throws LocalizedException
     */
    public function execute(): ResultInterface|ResponseInterface|Redirect
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $deleted = 0;

        foreach ($collection as $rma) {
            try {
                $rma->delete();
                $deleted++;
            } catch (Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }

        if ($deleted) {
            $this->messageManager->addSuccessMessage(__('A total of %1 RMA request(s) have been deleted.', $deleted));
        }

        return $this->resultRedirectFactory->create()->setPath('*/*/');
    }
}
