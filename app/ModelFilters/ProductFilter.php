<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }
    public function priceMax(int $value){
        return $this->where('price', '<=', $value);
    }
    public function priceMin(int $value){
        return $this->where('price', '>=', $value);
    }
    public function weightMax(int $value){
        return $this->where('weight', '<=', $value);
    }
    public function weightMin(int $value){
        return $this->where('weight', '>=', $value);
    }
    public function company($value){
       return $this->whereHas('companies', function($query) use ($value){
            return $query->where('name', $value);
        });
    }
    public function catalog($value){
        return $this->whereHas('catalogs', function($query) use ($value){
            return $query->where('name', $value);
        });
    }
}
