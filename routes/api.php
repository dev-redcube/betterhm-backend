<?php

use App\Http\Controllers\CalendarLinkController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MvgController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::redirect("/", "/admin");

Route::prefix("/mvg")->group(function () {
    Route::get("/departures/{station}", [MvgController::class, "departures"])->where("station", "^de:\d+:\d+$");
});

Route::prefix("/movies")->group(function () {
    Route::get("/", [MovieController::class, "index"]);
    Route::get("/{movie:title}", [MovieController::class, "show"]);
});

Route::get("/events", [EventController::class, "index"]);
Route::prefix("/events")->group(function () {
    Route::get("/", [EventController::class, "ical"]);
    Route::get("/ical", [EventController::class, "ical"]);
    Route::get("/json", [EventController::class, "json"]);
});

// Temporary for dates api
Route::get("/dates-api/thisSemester/all.json", function () {
    return response()->file(storage_path("app/public/static/dates.json"));
});

Route::get("calendarLinks", [CalendarLinkController::class, "all"]);
