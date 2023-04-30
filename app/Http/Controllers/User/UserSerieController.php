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

}
