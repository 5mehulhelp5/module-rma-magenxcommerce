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

namespace Magenx\Rma\Model;

use Magenx\Rma\Api\Data\ItemInterface;
use Magenx\Rma\Model\ResourceModel\Item as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;

class Item extends AbstractModel implements ItemInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'rma_item_model';

    /**
     * @return void
     * @throws LocalizedException
     */
    protected function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        $id = $this->getData(self::ENTITY_ID);
        return $id !== null ? (int)$id : null;
    }

    /**
     * @param $entityId
     * @return self
     */
    public function setEntityId($entityId): self
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @return int
     */
    public function getRmaId(): int
    {
        return (int)$this->getData(self::RMA_ID);
    }

    /**
     * @param int $rmaId
     * @return self
     */
    public function setRmaId(int $rmaId): self
    {
        return $this->setData(self::RMA_ID, $rmaId);
    }

    /**
     * @return int
     */
    public function getOrderItemId(): int
    {
        return (int)$this->getData(self::ORDER_ITEM_ID);
    }

    /**
     * @param int $orderItemId
     * @return self
     */
    public function setOrderItemId(int $orderItemId): self
    {
        return $this->setData(self::ORDER_ITEM_ID, $orderItemId);
    }

    /**
     * @return int
     */
    public function getQtyRequested(): int
    {
        return (int)$this->getData(self::QTY_REQUESTED);
    }

    /**
     * @param int $qtyRequested
     * @return self
     */
    public function setQtyRequested(int $qtyRequested): self
    {
        return $this->setData(self::QTY_REQUESTED, $qtyRequested);
    }

    /**
     * @return int|null
     */
    public function getQtyApproved(): ?int
    {
        $val = $this->getData(self::QTY_APPROVED);
        return $val !== null ? (int)$val : null;
    }

    /**
     * @param int|null $qtyApproved
     * @return self
     */
    public function setQtyApproved(?int $qtyApproved): self
    {
        return $this->setData(self::QTY_APPROVED, $qtyApproved);
    }

    /**
     * @return int|null
     */
    public function getQtyReturned(): ?int
    {
        $val = $this->getData(self::QTY_RETURNED);
        return $val !== null ? (int)$val : null;
    }

    /**
     * @param int|null $qtyReturned
     * @return self
     */
    public function setQtyReturned(?int $qtyReturned): self
    {
        return $this->setData(self::QTY_RETURNED, $qtyReturned);
    }

    /**
     * @return int|null
     */
    public function getConditionId(): ?int
    {
        $val = $this->getData(self::CONDITION_ID);
        return $val !== null ? (int)$val : null;
    }

    /**
     * @param int|null $conditionId
     * @return self
     */
    public function setConditionId(?int $conditionId): self
    {
        return $this->setData(self::CONDITION_ID, $conditionId);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param string $createdAt
     * @return self
     */
    public function setCreatedAt(string $createdAt): self
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * @param string $updatedAt
     * @return self
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
