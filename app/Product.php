<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function category()
    {
    	return $this->belongsto('App\Category');
    }
}
