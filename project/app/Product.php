<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'category', 'description','sizes', 'price', 'previous_price', 'stock', 'feature_image', 'policy', 'featured', 'views', 'created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;


    public function getCategoryAttribute($category)
    {
        if(self::$withoutAppends){
            return $category;
        }
        return explode(',',$category);
    }


}
