<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: catalog.proto

namespace Magento\CatalogStorefrontApi\Proto;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>magento.catalogStorefrontApi.proto.ProductLink</code>
 */
class ProductLink extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string linked_product_sku = 1;</code>
     */
    protected $linked_product_sku = '';
    /**
     * Generated from protobuf field <code>string type_id = 2;</code>
     */
    protected $type_id = '';
    /**
     * Generated from protobuf field <code>string linked_product_type = 3;</code>
     */
    protected $linked_product_type = '';
    /**
     * Generated from protobuf field <code>string link_type_id = 4;</code>
     */
    protected $link_type_id = '';
    /**
     * Generated from protobuf field <code>int32 position = 5;</code>
     */
    protected $position = 0;
    /**
     * Generated from protobuf field <code>string sku = 6;</code>
     */
    protected $sku = '';
    /**
     * Generated from protobuf field <code>string product_id = 7;</code>
     */
    protected $product_id = '';
    /**
     * Generated from protobuf field <code>string link_type = 8;</code>
     */
    protected $link_type = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $linked_product_sku
     *     @type string $type_id
     *     @type string $linked_product_type
     *     @type string $link_type_id
     *     @type int $position
     *     @type string $sku
     *     @type string $product_id
     *     @type string $link_type
     * }
     */
    public function __construct($data = null)
    {
        \Magento\CatalogStorefrontApi\Metadata\Catalog::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string linked_product_sku = 1;</code>
     * @return string
     */
    public function getLinkedProductSku()
    {
        return $this->linked_product_sku;
    }

    /**
     * Generated from protobuf field <code>string linked_product_sku = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setLinkedProductSku($var)
    {
        GPBUtil::checkString($var, true);
        $this->linked_product_sku = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string type_id = 2;</code>
     * @return string
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Generated from protobuf field <code>string type_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTypeId($var)
    {
        GPBUtil::checkString($var, true);
        $this->type_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string linked_product_type = 3;</code>
     * @return string
     */
    public function getLinkedProductType()
    {
        return $this->linked_product_type;
    }

    /**
     * Generated from protobuf field <code>string linked_product_type = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setLinkedProductType($var)
    {
        GPBUtil::checkString($var, true);
        $this->linked_product_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string link_type_id = 4;</code>
     * @return string
     */
    public function getLinkTypeId()
    {
        return $this->link_type_id;
    }

    /**
     * Generated from protobuf field <code>string link_type_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLinkTypeId($var)
    {
        GPBUtil::checkString($var, true);
        $this->link_type_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 position = 5;</code>
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Generated from protobuf field <code>int32 position = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setPosition($var)
    {
        GPBUtil::checkInt32($var);
        $this->position = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string sku = 6;</code>
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Generated from protobuf field <code>string sku = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setSku($var)
    {
        GPBUtil::checkString($var, true);
        $this->sku = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string product_id = 7;</code>
     * @return string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Generated from protobuf field <code>string product_id = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setProductId($var)
    {
        GPBUtil::checkString($var, true);
        $this->product_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string link_type = 8;</code>
     * @return string
     */
    public function getLinkType()
    {
        return $this->link_type;
    }

    /**
     * Generated from protobuf field <code>string link_type = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setLinkType($var)
    {
        GPBUtil::checkString($var, true);
        $this->link_type = $var;

        return $this;
    }
}
