<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarLinkResource;
use App\Models\CalendarLink;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class CalendarLinkController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("CalendarLinks/Index", [
            "links" => CalendarLink::all(),
        ]);
    }

    public function all(): AnonymousResourceCollection
    {
        return CalendarLinkResource::collection(CalendarLink::all());
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "url" => "url:http,https",
        ]);

        CalendarLink::create($validated);

        return redirect(route("calendarLinks.index"));
    }

    public function destroy(CalendarLink $calendarLink): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $calendarLink->delete();

        return redirect(route("calendarLinks.index"));
    }
}
