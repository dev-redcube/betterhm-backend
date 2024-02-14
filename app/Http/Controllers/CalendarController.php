<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CalendarController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            [
                "id" => "8f67ec3c-8729-4d26-9b8c-74038173680a",
                "name" => "HM Fristen & Termine",
                "url" => "https://betterhm.huber.cloud/events/ical"
            ],
        ]);
    }
}
