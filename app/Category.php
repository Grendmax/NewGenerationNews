<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const list = [
        'Политика',
        'Экономика',
        'Проишествия',
        'Общество',
        'Культура',
        'Спорт',
        'Наука',
        'Авто',
        'Медицина',
        'Hi-tech'
    ];

    static function list(){
        return self::list;
    }

    public function validate($attribute, $value, $parameters, $validator){
        $list=self::list();
        return isset($list[$value]);
    }
}
