<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = "categories";

    //định nghĩa relationship
    public function parent()
    {
        return $this->belongsTo("App\Category", "parent_id");
    }

    // relationship one to many
    public function products()
    {
        return $this->hasMany('App\Product');
    }

    // relationship one to many
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
