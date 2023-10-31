<?php

use App\Http\Controllers\KinoController;
use App\Http\Controllers\MvgController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("/mvg")->group(function () {
    Route::get("/departures/{station}", [MvgController::class, "departures"])->where("station", "^de:\d+:\d+$");
});

Route::prefix("/kino")->group(function () {
   Route::get("/", [KinoController::class, "index"]);
});
