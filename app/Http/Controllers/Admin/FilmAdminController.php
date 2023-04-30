<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmAdminController extends Controller
{
    //here we will implement the functionalities of the film from the admin point of vuew
    public function CreateFilm(Request $request){
        $request->validate([
            "film_name"=>"string|required",
            "film_description"=>"string|required",
            "film_director"=>"string|required",
            "film_producer"=>"string|required",
        ]);
        $film = Film::create([
            "film_name"=>$request->film_name,
            "film_description"=>$request->film_description,
            "film_director"=>$request->film_director,
            "film_producer"=>$request->film_producer,
        ]);
        return response()->json(["film"=>$film]);
    }
    public function UpdateFilm(Request $request , int $film_id){
        $request->validate([
            "film_name"=>"string|required",
            "film_description"=>"string|required",
            "film_director"=>"string|required",
            "film_producer"=>"string|required",
        ]);
        $film = Film::find($film_id);
        $film->film_name = $request->film_name;
        $film->film_description = $request->film_description;
        $film->film_director = $request->film_director;
        $film->film_producer = $request->film_producer;
        $film->save();
        return response()->json(["film"=>$film]);
    }
    public function VieFilmDetails(int $film_id){
        $film = Film::find($film_id);
        return response()->json(["film"=>$film]);
    }


}
