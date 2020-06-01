<?php

namespace App\Casts;

use App\Category;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Psy\Exception\TypeErrorException;

class CategoryCast implements CastsAttributes
{

    public function get($model, $key, $value, $attributes)
    {
        return $this->getCategory($value);
    }

    public function set($model, $key, $value, $attributes)
    {
        $this->getCategory($value);
        return $value;
    }

    protected function getCategory($index){
        $list=Category::list();

        if(!isset($list[$index]))
            throw new TypeErrorException("Status index[$index] not defined.");

        return $list[$index];
    }
}
