<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = [
        "name",
        "email",
        "password",
        "phone",
        "last_activity",
        "fb_id",
        "google_id"
    ];
    protected $hidden = [
        "password",
        "remember_token"
    ];
    public $timestamps = false;
}
