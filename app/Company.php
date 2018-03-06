<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected  $primaryKey = 'CompanyID';
    protected $fillable = ['CompanyName', 'CompanyAddress', 'City', 'CompanyEmail', 'CompanyPhone'];
}
