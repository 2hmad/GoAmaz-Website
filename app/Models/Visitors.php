<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    use HasFactory;
    protected $fillable = [
        'page',
        'date',
        'ip'
    ];
    protected $hidden = [];
    public $timestamps = false;
}
