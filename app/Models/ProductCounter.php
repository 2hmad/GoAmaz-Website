<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCounter extends Model
{
    use HasFactory;
    public $table = "product_counter";
    protected $fillable = [
        'product',
        'ip',
        'date'
    ];
    protected $hidden = [];
    public $timestamps = false;
}
