<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmWatchRecord extends Model
{
    use HasFactory;
    protected $fillable=["film_watch_record_film_id","film_watch_record_user_id"];
}
