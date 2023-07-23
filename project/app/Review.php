<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['productid', 'name', 'email', 'review', 'rating', 'review_date'];
    public $timestamps = false;

    public static function ratings($productid){
        $star = 0;
        $stars = Review::where('productid',$productid)->avg('rating');
        if ($stars != ""){
            $stat = explode('.',$stars);
            if ($stat[1] != 0){
                $star = intval($stars)+1;
            }else{
                $star = $stars;
            }
        }
        return $star;
    }
}
