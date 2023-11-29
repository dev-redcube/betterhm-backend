<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarproviderResource;
use App\Models\CalendarProvider;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class CalendarProviderController extends Controller
{
    public function index(): Response
    {
        return Inertia::render("CalendarProviders/Index", [
            "calendarProviders" => CalendarProvider::all(),
        ]);
    }

    public function all(): AnonymousResourceCollection
    {
        return CalendarproviderResource::collection(CalendarProvider::all());
    }

    public function store(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "url" => "url:http,https",
        ]);

        CalendarProvider::create($validated);

        return redirect(route("calendarProviders.index"));
    }

    public function destroy(CalendarProvider $calendarProvider): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $calendarProvider->delete();

        return redirect(route("calendarProviders.index"));
    }
}
