<?php
/**
 * Mage-OS
 * Copyright (c) Mage-OS Association (https://mage-os.org/)
 * SPDX-License-Identifier: MIT
 *
 * Forked from mage-os/module-rma 2.4.1 into Magenx_Rma / Magenx_RmaGraphQl;
 * identifiers renamed, GraphQL surface split into a sibling module.
 * Modified by MagenX: declared the pre-fork class name in getAliases().
 */
declare(strict_types=1);

namespace Magenx\Rma\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddRmaResolutionTypes implements DataPatchInterface
{
    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        protected readonly ModuleDataSetupInterface $moduleDataSetup
    ) {
    }

    /**
     * @return $this
     */
    public function apply(): self
    {
        $this->moduleDataSetup->startSetup();

        $connection = $this->moduleDataSetup->getConnection();
        $tableName = $this->moduleDataSetup->getTable('rma_resolution_type');

        $resolutionTypes = [
            [
                'code' => 'repair',
                'label' => 'Repair',
                'is_active' => 1,
                'sort_order' => 10
            ],
            [
                'code' => 'return',
                'label' => 'Return',
                'is_active' => 1,
                'sort_order' => 20
            ],
            [
                'code' => 'exchange',
                'label' => 'Exchange',
                'is_active' => 1,
                'sort_order' => 30
            ]
        ];

        foreach ($resolutionTypes as $resolutionType) {
            $connection->insertOnDuplicate($tableName, $resolutionType, ['label', 'is_active', 'sort_order']);
        }

        $this->moduleDataSetup->endSetup();

        return $this;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases(): array
    {
        // The module was forked from mage-os/module-rma, so this patch has
        // already run under its old class name on any store that ran the
        // upstream package. Declaring the alias stops Magento from treating it
        // as a new patch and re-seeding the lookup table (which would reset an
        // admin-customized label / sort order back to the shipped default).
        return ['MageOS\\RMA\\Setup\\Patch\\Data\\AddRmaResolutionTypes'];
    }
}
