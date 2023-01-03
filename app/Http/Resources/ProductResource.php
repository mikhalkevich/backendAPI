<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $media_arr = [];
        //http://localhost:8000/storage/1/1665560445587.jpeg
        foreach($this->getMedia('product') as $medi){
            $media_arr[]=asset('storage/'.$medi['id'].'/'.$medi['file_name']);
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'small_description' => $this->small_description,
            'price' => $this->when($request->price, $this->price),
            'pictures' => $this->when($request->pictures, $media_arr),
            'catalogs' => $this->when($request->catalogs, CatalogResource::collection($this->catalogs)),
            'companies' => $this->when($request->companies, CompanyResource::collection($this->companies)),
        ];
    }
}
