<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'EndDate',
        'classification',
        'contact',
        'cat_Id',
        'quantity',
        'price',
        'dis1',
        'dis2',
        'dis3'
    ];
}
