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

namespace Magenx\Rma\Ui\Component\Listing\Column;

use Magenx\Rma\Model\RMA\StatusCodes;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class StatusActions extends Column
{
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        protected readonly UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource): array
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        $columnName = (string) $this->getData('name');

        foreach ($dataSource['data']['items'] as &$item) {
            if (!isset($item['entity_id'])) {
                continue;
            }

            $item[$columnName] = [
                'edit' => [
                    'href' => $this->urlBuilder->getUrl('rma/status/edit', [
                        'entity_id' => $item['entity_id'],
                    ]),
                    'label' => __('Edit'),
                ],
            ];

            if (!StatusCodes::isProtected($item['code'] ?? '')) {
                $item[$columnName]['delete'] = [
                    'href' => $this->urlBuilder->getUrl('rma/status/delete', [
                        'entity_id' => $item['entity_id'],
                    ]),
                    'label' => __('Delete'),
                    'confirm' => [
                        'title' => __('Delete status'),
                        'message' => __('Are you sure you want to delete this status?'),
                    ],
                    'post' => true,
                ];
            }
        }

        return $dataSource;
    }
}
