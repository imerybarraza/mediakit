<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'iduser', 
        'username', 
        'account_type', 
        'media_count'
    ];
}
