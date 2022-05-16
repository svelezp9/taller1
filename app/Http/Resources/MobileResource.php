<?php
 
namespace App\Http\Resources;
 
use Illuminate\Http\Resources\Json\JsonResource;
 
class MobileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'brand' => $this->getBrand(),
            'model' => $this->getModel(),
            'linkToMobile' => 'http://127.0.0.1/mobiles/'.$this->getId(),
        ];
    }
}
