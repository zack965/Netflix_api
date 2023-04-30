<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CommentMovie;
use App\Models\Film;
use App\Models\FilmWatchRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserFilmController extends Controller
{
    //
    public function SearchForFilmByName(string $file_name,int $category_id = null){
        $films = Film::where("film_name","LIKE","%".$file_name."%")->where("categorie_id",$category_id)->get();
        return response()->json($films,200);
    }
    public function WatchMovie(Request $request){
        $request->validate([
            "film_id"=>"required|numeric"
        ]);
        $film = Film::find($request->film_id);
        if($film){

            $user_id = Auth::id();
            $id_filmWatchRecord_exists = FilmWatchRecord::where("film_watch_record_film_id",$film->film_id)->where("film_watch_record_user_id",$user_id)->first();
            if($id_filmWatchRecord_exists){
                return response()->json($id_filmWatchRecord_exists,200);
            }else{
                $filmWatchRecord = FilmWatchRecord::create([
                    "film_watch_record_user_id"=>$user_id,
                    "film_watch_record_film_id"=>$request->film_id,
                ]);
                return response()->json($filmWatchRecord,201);
            }
        }else{
            return response()->json(["msg"=>"film not found"],404);
        }
    }
    public function AddCommentOnMovie(Request $request ,int $film_id){
        $request->validate([
            "film_start_number_comment"=>"numeric|min:1|max:5",
            "film_start_comment"=>"required|string"
        ]);
        $film = Film::find($film_id);
        if($film){
            $user_id = Auth::id();
            $commentMovie = CommentMovie::create([
                "comment_movie_user_id"=>$user_id,
                "comment_movie_film_id"=>$film_id,
                "comment_start_number"=>$request->film_start_number_comment,
                "comment_text"=>$request->film_start_comment,
            ]);
            return response()->json($commentMovie,201);
        }else{
            return response()->json(["msg"=>"film not found"],404);
        }
    }
}
