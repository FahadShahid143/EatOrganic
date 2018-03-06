<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'CustomerID';
    protected $fillable = ['FirstName', 'LastName', 'CustomerEmail', 'CustomerPhone', 'CustomerAddress', 'City'];
}
