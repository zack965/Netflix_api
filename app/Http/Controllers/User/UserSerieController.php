<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use Illuminate\Http\Request;

class UserSerieController extends Controller
{
    //
    public function SearchForSerieByName(Request $request,int $category_id = null){
        $request->validate([
            'serie_name' => 'required|string',
        ]);
        $films = Serie::where("serie_name","LIKE","%".$request->serie_name."%")->where("categorie_id",$category_id)->get();
        return response()->json($films,200);
    }
    public function GetSerieDetails(int $serie_id){
        $serie = Serie::find($serie_id);
        if($serie){
            $serie->episodes;
            return response()->json($serie,200);
        }else{
            return response()->json(false,404);
        }
    }

}
