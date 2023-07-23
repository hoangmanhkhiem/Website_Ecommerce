<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "cart";
    protected $fillable = ['uniqueid', 'title', 'product', 'quantity','size', 'cost'];
    public $timestamps = false;
}
