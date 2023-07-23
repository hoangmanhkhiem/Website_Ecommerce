<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['type', 'advertiser_name', 'redirect_url', 'banner_size', 'banner_file', 'script', 'clicks', 'status'];
    protected $attributes = array(
        'advertiser_name' => "",
        'script' => ""
    );
    public $timestamps = false;
}
