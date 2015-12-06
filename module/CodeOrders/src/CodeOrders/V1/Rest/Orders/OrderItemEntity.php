<?php
namespace CodeOrders\V1\Rest\Orders;

class OrderItemEntity
{
    protected $id;
    protected $order_id;
    protected $product_id;
    protected $quantity;
    protected $price;
    protected $total;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

     public function setOrderId($order_id)
    {
        $this->order_id= $order_id;
        return $this;
    }

    public function setProductId($product_id)
    {
        $this->product_id= $product_id;
        return $this;
    }

     public function getProductId()
    {
        return $this->product_id;
    }

    public function setQuantity($quantity)
    {
        $this->quantity= $quantity;
        return $this;
    }

     public function getQuantity()
    {
        return $this->quantity;
    }

     public function setTotal($total)
    {
        $this->total= $total;
        return $this;
    }

     public function getTotal()
    {
        return $this->total;
    }


}