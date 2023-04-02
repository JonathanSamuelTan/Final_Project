<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'ProductName',
        'CategoryID',
        'Price',
        'Quantity',
        'ProductIMG'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
