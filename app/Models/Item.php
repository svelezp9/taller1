<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Mobile;

class Item extends Model
{
    use HasFactory;

    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->attributes['mobile_id'] - int - contains the referenced mobile id
     * $this->attributes['accessory_id'] - int - contains the referenced accessory id
     * $this->attributes['created_at'] - timestamp - contains the item creation date
     * $this->attributes['updated_at'] - timestamp - contains the item update date
     * $this->order - Order - contains the associated Order
     * $this->mobile - Mobile - contains the associated Mobile
     * $this->accessory - Accessory - contains the associated Accessory
     */
    public static function validate($request)
    {
        $request->validate(
            [
            "price" => "required|numeric|gt:0",
            "quantity" => "required|numeric|gt:0",
            "mobile_id" => "required|exists:mobiles,id",
            "order_id" => "required|exists:orders,id",
            "accessory_id" => "required|exists:accessory,id",
            ]
        );
    }
    
    public function getId()
    {
        return $this->attributes['id'];
    }
    
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    
    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }
    
    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }
    
    public function getPrice()
    {
        return $this->attributes['price'];
    }
    
    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }
    
    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }
    
    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }
    
    public function getMobileId()
    {
        return $this->attributes['mobile_id'];
    }
    
    public function setMobileId($mobileId)
    {
        $this->attributes['mobile_id'] = $mobileId;
    }
    public function getAccessoryId()
    {
        return $this->attributes['accessory_id'];
    }
    
    public function setAccessoryId($accessoryId)
    {
        $this->attributes['accessory_id'] = $accessoryId;
    }
    
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
    public function getOrder()
    {
        return $this->order;
    }
    
    public function setOrder($order)
    {
        $this->order = $order;
    }
    
    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }
    
    public function getMobile()
    {
        return $this->mobile;
    }
    
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function accessory()
    {
        return $this->belongsTo(Accessory::class);
    }
    
    public function getAccessory()
    {
        return $this->accessory;
    }
    
    public function setAccessory($accessory)
    {
        $this->accessory = $accessory;
    }
}
