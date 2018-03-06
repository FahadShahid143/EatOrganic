<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductID';
    protected $fillable = ['ProductName', 'ProductDesc', 'ProductImage', 'CategoryID', 'CompanyID', 'Price', 'Discount', 'Availability'];
}
