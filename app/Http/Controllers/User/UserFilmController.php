<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class UserFilmController extends Controller
{
    //
    public function SearchForFilmByName(string $file_name,int $category_id = null){
        $films = Film::where("film_name","LIKE","%".$file_name."%")->where("categorie_id",$category_id)->get();
        return response()->json($films,200);
    }
}
