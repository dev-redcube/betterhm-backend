<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    public function ical(): Application|Response|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $events = Cache::remember("events.ical", 86400, function () {
            return Http::get("https://api.betterhm.app/dates-api/ical/calendar.ics")->body();
        });

        return response($events)
            ->withHeaders([
                "Content-Type" => "text/calendar"
            ]);
    }

    public function json(): JsonResponse
    {
        $events = Cache::remember("events.json", 86400, function () {
            return Http::get("https://api.betterhm.app/dates-api/thisSemester/all.json")->json();
        });

        return response()->json($events);
    }
}
