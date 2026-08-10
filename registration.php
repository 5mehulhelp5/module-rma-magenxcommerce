<?php
/**
 * Copyright © Magenx. All rights reserved.
 * SPDX-License-Identifier: MIT
 *
 * Original work, part of the Magenx fork of mage-os/module-rma
 * (MIT, Copyright (c) Mage-OS Association) — see LICENSE.
 *
 * Magenx_Rma — Return Merchandise Authorization (backend engine).
 * See README.md → Fork provenance.
 */
declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(ComponentRegistrar::MODULE, 'Magenx_Rma', __DIR__);
