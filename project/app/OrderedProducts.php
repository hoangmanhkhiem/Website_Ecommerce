<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProducts extends Model
{
    public $table = "ordered_products";
    protected $fillable = [
        'orderid', 'owner', 'vendorid', 'productid','paid','payment', 'quantity', 'cost', 'created_at', 'updated_at', 'size', 'status'
    ];
//    public static $withoutAppends = false;
//
//    public function getProductidAttribute($productid)
//    {
//        if(self::$withoutAppends){
//            return $productid;
//        }
//        return Product::findOrFail($productid);
//    }




}
