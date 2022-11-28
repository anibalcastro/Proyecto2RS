<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'idUser',
        'title',
        'comment',
        'type_publish',
        'date',
        'published_at',
        'twitter',
        'status'
    ];
}
