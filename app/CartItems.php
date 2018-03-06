<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    protected $primaryKey = 'CartItemID';
    protected $fillable = ['ShoppingCartID', 'ProductID', 'quantity'];
}
