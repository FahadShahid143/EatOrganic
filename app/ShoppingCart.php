<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $primaryKey = 'ShoppingCartID';
    protected $fillable = ['CustomerID'];
}
