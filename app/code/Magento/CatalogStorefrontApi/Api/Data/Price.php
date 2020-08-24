<?php
# Generated by the Magento PHP proto generator.  DO NOT EDIT!

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\CatalogStorefrontApi\Api\Data;

/**
 * Autogenerated description for Price class
 *
 * phpcs:disable Magento2.PHP.FinalImplementation
 * @SuppressWarnings(PHPMD)
 * @SuppressWarnings(PHPCPD)
 */
final class Price implements PriceInterface
{

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $scope;
    
    /**
     * @inheritdoc
     *
     * @return float
     */
    public function getPrice(): float
    {
        return (float) $this->price;
    }
    
    /**
     * @inheritdoc
     *
     * @param float $value
     * @return void
     */
    public function setPrice(float $value): void
    {
        $this->price = $value;
    }
    
    /**
     * @inheritdoc
     *
     * @return string
     */
    public function getScope(): string
    {
        return (string) $this->scope;
    }
    
    /**
     * @inheritdoc
     *
     * @param string $value
     * @return void
     */
    public function setScope(string $value): void
    {
        $this->scope = $value;
    }
}
