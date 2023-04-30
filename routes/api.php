<?php

use App\Http\Controllers\Admin\AdminSerieController;
use App\Http\Controllers\Admin\FilmAdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserFilmController;
use App\Http\Controllers\User\UserSerieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("SignUp",[AuthController::class,"SignUp"]);
// these routes are protected by token
Route::group(["middleware" => "auth:sanctum"], function () {

    Route::post("CreateFilm",[FilmAdminController::class,"CreateFilm"]);
    Route::put("UpdateFilm/{film_id}",[FilmAdminController::class,"UpdateFilm"]);
    Route::get("VieFilmDetails/{film_id}",[FilmAdminController::class,"VieFilmDetails"]);
    //admin serie routes
    Route::post("AddSerie",[AdminSerieController::class,"AddSerie"]);
    //user routes
    Route::get("SearchForFilmByName/{film_name}/{category_id?}",[UserFilmController::class,"SearchForFilmByName"]);
    Route::post("WatchMovie",[UserFilmController::class,"WatchMovie"]);
    Route::post("AddCommentOnMovie/{film_id}",[UserFilmController::class,"AddCommentOnMovie"]);
    //api route for user in series
    Route::get("SearchForSerieByName/{category_id?}",[UserSerieController::class,"SearchForSerieByName"]);
});
