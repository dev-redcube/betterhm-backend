<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render("Admin/Faculties/Index", [
            "faculties" => Faculty::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {
        $request->validate([
            "name" => "string|max:255|unique",
        ]);

        Faculty::create($request->only(["name"]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return Inertia::render("Dashboard");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty): void
    {
        $faculty->delete();
    }
}
