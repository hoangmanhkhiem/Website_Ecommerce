<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use stdClass;

class Withdraw extends Model
{
    protected $fillable = ['vendorid', 'method', 'acc_email', 'iban', 'country', 'acc_name', 'address', 'swift', 'reference', 'amount', 'fee', 'created_at', 'updated_at', 'status'];

    public static $withoutAppends = false;

    public function getVendoridAttribute($vendorid)
    {
        $object = new stdClass();
        $object->shop_name = "Vendor Removed";
        $object->name = "Vendor Removed";
        $object->email = "Vendor Removed";
        $object->phone = "Vendor Removed";
        $object->id = "#";

        if(self::$withoutAppends){
            return $vendorid;
        }
        if (Vendors::where('id',$vendorid)->count()>0){
            return Vendors::findOrFail($vendorid);
        }else{
            return $object;
        }
    }
}
