<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductID';
    protected $fillable = ['ProductName', 'ProductDesc', 'ProductImage', 'CompanyID', 'Price', 'Discount', 'Availability', 'Ripness'];

    public function categories(){
        return $this->belongsToMany('App\Category', 'category_product', 'ProductID', 'CategoryID');
    }
}
