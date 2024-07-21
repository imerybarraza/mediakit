<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCount extends Model
{
    use HasFactory;

    protected $table = 'social_count';

    protected $fillable = [
        'user_id',
        'platform',
        'social_id',
        'access_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'iduser');
    }
}
