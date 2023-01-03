<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MediaController extends Controller
{
    public function addPictureToProduct(Product $product,Request $request){
        $product->addMedia($request->file('picture'))->toMediaCollection('product');
    }
}
