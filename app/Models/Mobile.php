<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Item;
use Laravel\Scout\Searchable;

use Laravel\Scout\Attributes\SearchUsingPrefix;

class Mobile extends Model
{
    use Searchable;
    /**
     * $this->attributes['id'] - int - contains the mobile primary key (id)
     * $this->attributes['name'] - string - contains name of the mobile
     * $this->attributes['price'] - float - contains the price of the mobile
     * $this->attributes['brand'] - string - contains the brand's name of the mobile
     * $this->attributes['model'] - string - contains the model of the mobile
     * $this->attributes['color'] - string - contains the color of the mobile
     * $this->attributes['ramMemory'] - int - contains the size of the RAM of the mobile
     * $this->attributes['storage '] - int - contains the size of the ROM of the mobile
     * $this->attributes['imgName'] - string - contains the name of the img file of the mobile, the default route in pc for media will be /Taller1/public
     * $this->reviews - Reviews[] - contains the associated reviews
     * $this->items - Item[] - contains the associated items
     */

    protected $fillable = ['name', 'price', 'brand', 'model', 'color', 'ramMemory', 'storage', 'imgName'];

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

    public function getModel()
    {

        return $this->attributes['model'];
    }

    public function setModel($model)
    {

        $this->attributes['model'] = $model;
    }

    public function getColor()
    {

        return $this->attributes['color'];
    }

    public function setColor($color)
    {

        $this->attributes['color'] = $color;
    }

    public function getRamMemory()
    {

        return $this->attributes['ramMemory'];
    }

    public function setRamMemory($ramMemory)
    {

        $this->attributes['ramMemory'] = $ramMemory;
    }

    public function getStorage()
    {

        return $this->attributes['storage'];
    }

    public function setStorage($storage)
    {

        $this->attributes['storage'] = $storage;
    }

    public function getImgName()
    {

        return $this->attributes['imgName'];
    }

    public function setImgName($imgName)
    {

        $this->attributes['imgName'] = $imgName;
    }

    public function reviews()
    {

        return $this->hasMany(Review::class);
    }

    public function getReviews()
    {

        return $this->reviews;
    }

    public function setReviews($reviews)
    {

        $this->reviews = $reviews;
    }
    public function accessories()
    {

        return $this->hasMany(Accessory::class);
    }

    public function getAccessories()
    {

        return $this->accesories;
    }

    public function setAccessories($accessories)
    {

        $this->accessories = $accessories;
    }
    public static function validate(Request $request)
    {
        $rules = [

            "name" => "required",
            "price" => "required|numeric|min:0|not_in:0",
            "brand" => "required",
            "model" => "required",
            "color" => "required",
            "ramMemory" => "required|numeric|min:0|not_in:0",
            "storage" => "required|numeric|min:0|not_in:0",
            "imgName" => "required",
        ];
        $request->validate($rules);
    }

    public static function sumPricesByQuantities($mobiles, $productsInSession)
    {
        $total = 0;
        foreach ($mobiles as $mobile) {
            $total = $total + ($mobile->getPrice() * $productsInSession[$mobile->getId()]);
        }
        return $total;
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

    #[SearchUsingPrefix(['id'])]
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }
}
