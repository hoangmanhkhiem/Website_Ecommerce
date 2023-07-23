<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['mainid', 'subid', 'role','name', 'slug'];

    public $timestamps = false;

    public static $withoutAppends = false;

    public function getMainidAttribute($mainid)
    {
        if ($mainid != ""){
            return Category::where('id',$mainid)->first();
        }
        return $mainid;
    }
    public function getSubidAttribute($subid)
    {
        if(self::$withoutAppends){
            return $subid;
        }

        return Category::where('id',$subid)->first();

    }

}
