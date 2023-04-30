<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Episode;
use App\Models\Serie;
use Illuminate\Http\Request;

class AdminSerieController extends Controller
{
    //
    public function AddSerie(Request $request){
        $request->validate([
            "serie_name"=>"required|string",
            "serie_director"=>"required|string",
            "categorie_id"=>"numeric",
        ]);
        $categori_app_id = null;
        if(!is_null($request->categorie_id)){
            $category = Category::find($request->categorie_id);
            if($category){

                $categori_app_id = $request->categorie_id;
            }
        }

        $serie = Serie::create([
            "serie_name"=>$request->serie_name,
            "serie_director"=>$request->serie_director,
            "categorie_id"=>$categori_app_id,
        ]);
        return response()->json($serie,201);
    }
    public function CreareEpisode(Request $request){
        $request->validate([
            "episode_name"=>"required|string",
            "serie_id"=>"numeric",
        ]);

        $serie = Episode::create([
            "episode_name"=>$request->episode_name,
            "serie_id"=>$request->serie_id,
        ]);
        return response()->json($serie,201);
    }
}
