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
        'thumbnail',
        'type_publish_id', 
        'Facebook', 
        'Instagram', 
        'Twitter', 
        'date',
        'published_at'
    ];
}
