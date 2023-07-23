<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageSettings extends Model
{
    protected $table = "page_settings";

    protected $fillable = ['contact', 'contact_email', 'about', 'faq', 'c_status', 'a_status', 'f_status'];

    public $timestamps = false;

//    public function getA_statusAttribute($data)
//    {
//        if ($data == 1){
//            $check = "checked";
//        }
//        else{
//            $check = "";
//        }
//        return $check;
//    }
}
