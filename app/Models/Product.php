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
        'r3',
        'main_price',
        'dis1',
        'dis2',
        'dis3',
        'days',
        'user_id'
    ];
    protected $hidden = [
        'r1',
        'r2',
        'r3',
        'main_price',
        'dis1',
        'dis2',
        'dis3'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
