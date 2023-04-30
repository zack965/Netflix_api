<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $primaryKey="serie_id";
    protected $fillable = ["serie_name","serie_director","categorie_id"];
    public function episodes(){
        return $this->hasMany(Episode::class,"serie_id");
    }
}
