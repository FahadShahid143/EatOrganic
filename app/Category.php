<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'CategoryID';
    protected $fillable = ['CategoryName', 'CategoryDesc'];


    public function products(){
        return $this->belongsToMany('App\Product', 'category_product', 'CategoryID', 'ProductID');
}
}
