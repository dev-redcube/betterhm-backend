<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CalendarController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            "name" => "HM Fristen & Termine",
            "url" => "https://api.betterhm.app/dates-api/ical/calendar.ics"
        ]);
    }
}
