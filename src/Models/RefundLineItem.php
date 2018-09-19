<?php

namespace BoldApps\ShopifyToolkit\Models;

use BoldApps\ShopifyToolkit\Traits\HasAttributesTrait;

class RefundLineItem
{
    use HasAttributesTrait;

    /** @var int */
    public $id;

    /** @var int */
    public $quantity;

    /** @var int */
    public $lineItemId;

    /** @var float */
    public $subtotal;

    /** @var float */
    public $totalTax;

    /** @var string */
    public $restockType;

    /** @var int */
    public $locationId;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getLineItemId()
    {
        return $this->lineItemId;
    }

    /**
     * @param int $lineItemId
     */
    public function setLineItemId($lineItemId)
    {
        $this->lineItemId = $lineItemId;
    }

    /**
     * @return float
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     */
    public function setSubtotal($subtotal)
    {
        $this->subtotal = $subtotal;
    }

    /**
     * @return float
     */
    public function getTotalTax()
    {
        return $this->totalTax;
    }

    /**
     * @param float $totalTax
     */
    public function setTotalTax($totalTax)
    {
        $this->totalTax = $totalTax;
    }

    /**
     * @param string $restockType
     */
    public function setRestockType($restockType)
    {
        $this->restockType = $restockType;
    }

    /**
     * @return string
     */
    public function getRestockType()
    {
        return $this->restockType;
    }

    /**
     * @param string int
     */
    public function setLocationId($id)
    {
        $this->locationId = $id;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }
}
