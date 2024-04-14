<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarCollection;
use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index(): CalendarCollection
    {
        $fristenTermine = new Calendar();
        $fristenTermine->id = "1776ed34-fccf-4845-aa1b-5c6821649804";
        $fristenTermine->name = "Fakultät 10 Fristen & Termine";
        $fristenTermine->url = "https://calendar.google.com/calendar/ical/qp1nk83jvkfm7a3m9goqhr5oo4%40group.calendar.google.com/public/basic.ics";

        return new CalendarCollection([$fristenTermine]);
    }
}
