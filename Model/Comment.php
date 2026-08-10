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

use Magenx\Rma\Api\Data\CommentInterface;
use Magenx\Rma\Model\ResourceModel\Comment as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Exception\LocalizedException;

class Comment extends AbstractModel implements CommentInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'rma_comment_model';

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
     * @return string
     */
    public function getAuthorType(): string
    {
        return (string)$this->getData(self::AUTHOR_TYPE);
    }

    /**
     * @param string $authorType
     * @return self
     */
    public function setAuthorType(string $authorType): self
    {
        return $this->setData(self::AUTHOR_TYPE, $authorType);
    }

    /**
     * @return string
     */
    public function getAuthorName(): string
    {
        return (string)$this->getData(self::AUTHOR_NAME);
    }

    /**
     * @param string $authorName
     * @return self
     */
    public function setAuthorName(string $authorName): self
    {
        return $this->setData(self::AUTHOR_NAME, $authorName);
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return (string)$this->getData(self::COMMENT);
    }

    /**
     * @param string $comment
     * @return self
     */
    public function setComment(string $comment): self
    {
        return $this->setData(self::COMMENT, $comment);
    }

    /**
     * @return bool
     */
    public function getIsVisibleToCustomer(): bool
    {
        return (bool)$this->getData(self::IS_VISIBLE_TO_CUSTOMER);
    }

    /**
     * @param bool $isVisible
     * @return self
     */
    public function setIsVisibleToCustomer(bool $isVisible): self
    {
        return $this->setData(self::IS_VISIBLE_TO_CUSTOMER, $isVisible);
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
}
