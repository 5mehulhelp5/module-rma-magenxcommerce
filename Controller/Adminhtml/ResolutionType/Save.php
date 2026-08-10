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

namespace Magenx\Rma\Controller\Adminhtml\ResolutionType;

use Magenx\Rma\Api\ResolutionTypeRepositoryInterface;
use Magenx\Rma\Controller\Adminhtml\AbstractLookupSave;
use Magenx\Rma\Model\ResolutionTypeFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends AbstractLookupSave
{
    const ADMIN_RESOURCE = 'Magenx_Rma::rma_resolution_type';

    /**
     * @param Context $context
     * @param ResolutionTypeRepositoryInterface $resolutionTypeRepository
     * @param ResolutionTypeFactory $resolutionTypeFactory
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        ResolutionTypeRepositoryInterface $resolutionTypeRepository,
        ResolutionTypeFactory $resolutionTypeFactory,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct(
            $context,
            $resolutionTypeRepository,
            $resolutionTypeFactory,
            $dataPersistor,
            'resolution type',
            'rma_resolution_type'
        );
    }
}
