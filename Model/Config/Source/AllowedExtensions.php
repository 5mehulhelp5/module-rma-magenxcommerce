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

namespace Magenx\Rma\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class AllowedExtensions implements OptionSourceInterface
{
    /**
     * Maps each supported extension to its permitted MIME types.
     * Keeping extension and MIME knowledge co-located avoids them drifting apart.
     */
    const EXTENSION_MIME_MAP = [
        'jpg'  => ['image/jpeg'],
        'jpeg' => ['image/jpeg'],
        'png'  => ['image/png'],
        'gif'  => ['image/gif'],
        'webp' => ['image/webp'],
        'mp4'  => ['video/mp4'],
        'mov'  => ['video/quicktime', 'video/x-quicktime'],
        'pdf'  => ['application/pdf'],
        'doc'  => ['application/msword'],
        'docx' => ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
    ];

    /**
     * @return array
     */
    public function toOptionArray(): array
    {
        $options = [];

        foreach (array_keys(self::EXTENSION_MIME_MAP) as $extension) {
            $options[] = [
                'value' => $extension,
                'label' => '.' . $extension,
            ];
        }

        return $options;
    }
}
