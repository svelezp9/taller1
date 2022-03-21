<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    /**
     * $this->attributes['id'] - int - contains the accessory primary key (id)
     * $this->attributes['name'] - string - contains name of the accessory
     * $this->attributes['price'] - float - contains the price of the accessory
     * $this->attributes['brand'] - string - contains the brand's name of the accessory
     * $this->attributes['description'] - string - contains the description of the accessory
     * $this->attributes['imgName'] - string - contains the name of the img file of the accessory, the default route in pc for media will be /Taller1/public
     * $this->attributes['mobile_id'] - int - contains the referenced mobile id
     * $this->items - Item[] - contains the associated items
     * $this->mobile - Mobile - contains the associated Mobile
     */

    protected $fillable = ['name', 'price', 'brand', 'model', 'imgName'];

    public function getId()

    {

        return $this->attributes['id'];
    }

    public function setId($id)

    {

        $this->attributes['id'] = $id;
    }

    public function getName()

    {

        return $this->attributes['name'];
    }

    public function setName($name)

    {

        $this->attributes['name'] = $name;
    }

    public function getPrice()

    {

        return $this->attributes['price'];
    }

    public function setPrice($price)

    {

        $this->attributes['price'] = $price;
    }

    public function getBrand()

    {

        return $this->attributes['brand'];
    }

    public function setBrand($brand)

    {

        $this->attributes['brand'] = $brand;
    }

    public function getDescription()

    {

        return $this->attributes['description'];
    }

    public function setDescription($description)

    {

        $this->attributes['description'] = $description;
    }

    public function getimgName()

    {

        return $this->attributes['imgName'];
    }

    public function setimgName($imgName)

    {

        $this->attributes['imgName'] = $imgName;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function getItems()
    {
        return $this->items;
    }
    
    public function setItems($items)
    {
        $this->items = $items;
    }

    public function getMobileId()
    {
        return $this->attributes['mobile_id'];
    }
    
    public function setMobileId($mobileId)
    {
        $this->attributes['mobile_id'] = $mobileId;
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
}
