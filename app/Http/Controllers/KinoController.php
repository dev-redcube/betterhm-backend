<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class KinoController extends Controller
{
    public function index(): Collection
    {
        return Movie::all();
//        $movie = Movie::create([
//            "title"=> "Aladdin",
//            "date" => "2023-11-23 19:00",
//            "fsk"  => 6,
//            "genre" => "Abenteuer",
//            "runtime" => 128,
//            "info" => "Mit seiner spektakulären",
//            "content" => "Aladdins Zuhause",
//            "coverUrl" => "https://unifilm.eu/kinodateien/App_Filmplakate/aladdin-2019-DE.png",
//            "trailerUrl" => "https://www.unifilm.de/filmdateien/trailer/3086%20D.mp4",
//        ]);
//        return $movie;
    }
}
