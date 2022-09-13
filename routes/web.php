<?php

use App\Http\Controllers\CourseController;
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
// Route::resource("courses",CourseController::class)->except([
//     "show"
// ]);
Route::group(["prefix"=>"courses","as"=>"courses."],function ()
{
    Route::get("/",[CourseController::class,"index"])->name("index");
    Route::get("/create",[CourseController::class,"create"])->name("create");
    Route::post("/create",[CourseController::class,"store"])->name("store");
    Route::get("/edit/{course}",[CourseController::class,"edit"])->name("edit");
    Route::put("/edit/{course}",[CourseController::class,"update"])->name("update");
    Route::delete("/destroy/{course}",[CourseController::class,"destroy"])->name("destroy");
    
});


