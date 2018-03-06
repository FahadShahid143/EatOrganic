<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'OrderID';
    protected $fillable = ['CustomerID', 'OrderDate'];
}
