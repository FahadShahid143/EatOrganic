<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'OrderDetailID';
    protected $fillable = ['OrderID', 'ProductID'];
}
