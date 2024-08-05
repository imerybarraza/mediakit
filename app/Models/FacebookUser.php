<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacebookUser extends Model
{
    protected $table = 'facebook_users';

    protected $fillable = [
        'iduser',
        'name',
        'profile_picture',
    ];
}
