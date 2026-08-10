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

namespace Magenx\Rma\Api\Email;

use Magenx\Rma\Api\Data\RMAInterface;

/**
 * @api
 */
interface SenderInterface
{
    /**
     * @param RMAInterface $rma
     * @return void
     */
    public function sendCustomerNewRmaEmail(RMAInterface $rma): void;

    /**
     * @param RMAInterface $rma
     * @param int $newStatusId
     * @return void
     */
    public function sendCustomerStatusChangeEmail(RMAInterface $rma, int $newStatusId): void;

    /**
     * @param RMAInterface $rma
     * @return void
     */
    public function sendAdminNewRmaEmail(RMAInterface $rma): void;
}
