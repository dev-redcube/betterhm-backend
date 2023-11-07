<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class MovieController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return MovieResource::collection(Movie::all());
    }

    public function show(Movie $movie): MovieResource
    {
        return new MovieResource($movie);
    }
}