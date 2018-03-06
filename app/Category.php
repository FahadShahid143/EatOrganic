<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'CategoryID';
    protected $fillable = ['CategoryName', 'CategoryDesc'];
}
