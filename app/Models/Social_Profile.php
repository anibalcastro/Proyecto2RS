<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_profile_id',
        'user_access_token'
    ];
}
