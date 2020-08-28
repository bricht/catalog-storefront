<?php
# Generated by the Magento PHP proto generator.  DO NOT EDIT!

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\CatalogStorefrontApi\Api\Data;

/**
 * Autogenerated description for KeyValue class
 *
 * phpcs:disable Magento2.PHP.FinalImplementation
 * @SuppressWarnings(PHPMD)
 * @SuppressWarnings(PHPCPD)
 */
final class KeyValue implements KeyValueInterface
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;
    
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getKey(): string
    {
        return (string) $this->key;
    }
    
    /**
     * @inheritdoc
     *
     * @param string $value
     * @return void
     */
    public function setKey(string $value): void
    {
        $this->key = $value;
    }
    
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getValue(): string
    {
        return (string) $this->value;
    }
    
    /**
     * @inheritdoc
     *
     * @param string $value
     * @return void
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
