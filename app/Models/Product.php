<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use EloquentFilter\Filterable;


class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Filterable;

    public $fillable = ['name', 'description', 'small_description', 'price', 'weight'];

    public function catalogs(){
        return $this->belongsToMany(Catalog::class);
    }
    public function companies(){
        return $this->belongsToMany(Company::class,'product_company');
    }
}
