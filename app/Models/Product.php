<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $product)
 * @method static find(int $id)
 * @method static selecte(string $string, string $string1)
 */
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'endDate',
        'classification',
        'contact',
        'cat_Id',
        'quantity',
        'price',
        'r1',
        'r2',
        'date1',
        'date2',
        'date3',
        'dis1',
        'dis2',
        'dis3'
    ];
    protected $hidden = [
        'price',
        'r1',
        'r2',
        'date1',
        'date2',
        'date3',
        'dis1',
        'dis2',
        'dis3'
    ];

}
