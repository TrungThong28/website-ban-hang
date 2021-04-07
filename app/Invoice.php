<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    //dinh nghia quan he cua cac bang
    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
