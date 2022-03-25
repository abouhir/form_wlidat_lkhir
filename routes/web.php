<?php

use App\Models\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('test/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//responsable 
Route::get("/responsables","ResponsableController@index")->name("responsable.index");
Route::get("/responsable/create","ResponsableController@create")->name("responsable.create");
Route::post("/responsable/store","ResponsableController@store")->name("responsable.store");
Route::post("/responsable/search","ResponsableController@search")->name("responsable.search");
Route::get("/responsable/{mot}","ResponsableController@show")->name("responsable.show");
Route::get("/responsable/edit/{mot}","ResponsableController@edit")->name("responsable.edit");
Route::put("/responsable/update/{mot}","ResponsableController@update")->name("responsable.update");
Route::delete("/responsable/delete/{mot}" , "ResponsableController@destroy")->name("responsable.delete");

//personne
Route::get("/personnes","PersonneController@index")->name("personne.index");
Route::get("/personne/create","PersonneController@create")->name("personne.create");
Route::post("/personne/store","PersonneController@store")->name("personne.store");
Route::post("/personne/search","PersonneController@search")->name("personne.search");
Route::get("/personne/{mot}" , "PersonneController@show")->name("personne.show");
Route::get("/personne/edit/{mot}","PersonneController@edit")->name("personne.edit");
Route::put("/personne/update/{mot}","PersonneController@update")->name("personne.update");
Route::delete("/personne/delete/{mot}" , "PersonneController@destroy")->name("personne.delete");


//enfant
Route::get("/enfants","EnfantController@index")->name("enfant.index"); 
Route::get("/enfant/create","EnfantController@create")->name("enfant.create");
Route::post("/enfants","EnfantController@store")->name("enfant.store");
Route::post("/enfant/search","EnfantController@search")->name("enfant.search");
Route::get("/enfant/{mot}" , "EnfantController@show")->name("enfant.show");
Route::get("/enfant/edit/{mot}","EnfantController@edit")->name("enfant.edit");
Route::put("/enfant/update/{mot}","EnfantController@update")->name("enfant.update");
Route::delete("/enfant/delete/{mot}" , "EnfantController@destroy")->name("enfant.delete");



Route::get("home/pdf/{mot}","HomeController@show")->name("home.show");
Route::get("home/imprimer/{mot}","HomeController@imprimer")->name("home.imprimer");
Route::post("home/search","HomeController@search")->name("home.search");

Route::get("/test/{mot}",function($mot){    $responsable = Responsable::all()->where("mot",$mot)->first();
 return view("pdf")->with("responsable",$responsable);})->name("home.test");


