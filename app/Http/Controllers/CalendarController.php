<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarCollection;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index(): CalendarCollection
    {
        $fristenTermine = new Calendar();
        $fristenTermine->id = "8f67ec3c-8729-4d26-9b8c-74038173680a";
        $fristenTermine->name = "HM Fristen & Termine";
        $fristenTermine->url = "https://betterhm.huber.cloud/events/ical";

        return new CalendarCollection([$fristenTermine]);
    }
}
