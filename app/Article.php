<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table ="articles";

     //định nghĩa relationship
    public function parent()
    {
        return $this->belongsTo("App\Category", "parent_id");
    }

    //định nghĩa relationship
    public function category()
    {
    	return $this->belongsto('App\Category');
    }
}
