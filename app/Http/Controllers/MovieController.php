<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class MovieController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $movies = Cache::remember('movies', 3600, function () {
            return Movie::all();
        });
        return MovieResource::collection($movies);
    }

    public function show(Movie $movie): MovieResource
    {
        return new MovieResource($movie);
    }
}
