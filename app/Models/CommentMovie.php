<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMovie extends Model
{
    use HasFactory;
    protected $fillable=["comment_movie_user_id","comment_movie_film_id","comment_text","comment_start_number"];
}
