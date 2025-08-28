<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    /**
     * List labs (HTML for browsers, JSON for API clients).
     */
    public function index(Request $request)
    {
        $labs = Lab::orderByDesc('id')->get(); // or ->withCount('barangs') if you need counts

        if ($request->wantsJson()) {
            return response()->json($labs);
        }

        return view('labs.index', compact('labs'));
    }

    /**
     * Show create form (HTML).
     */
    public function create()
    {
        return view('labs.create');
    }

    /**
     * Store a new lab.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lab' => 'required|string|max:255',
            'lokasi'   => 'required|string|max:255',
        ]);

        $lab = Lab::create($validated);

        if ($request->wantsJson()) {
            return response()->json($lab, 201);
        }

        return redirect()->route('labs.index')->with('success', 'Lab created.');
    }

    /**
     * Show edit form (HTML).
     */
    public function edit(Lab $lab)
    {
        return view('labs.edit', compact('lab'));
    }

    /**
     * Update an existing lab.
     */
    public function update(Request $request, Lab $lab)
    {
        $validated = $request->validate([
            'nama_lab' => 'sometimes|required|string|max:255',
            'lokasi'   => 'sometimes|required|string|max:255',
        ]);

        $lab->update($validated);

        if ($request->wantsJson()) {
            return response()->json($lab);
        }

        return redirect()->route('labs.index')->with('success', 'Lab updated.');
    }

    /**
     * Delete a lab.
     */
    public function destroy(Request $request, Lab $lab)
    {
        $lab->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        }

        return redirect()->route('labs.index')->with('success', 'Lab deleted.');
    }

    /**
     * Show lab detail.
     * (No Blade view provided, so HTML requests go to the edit page.)
     */
    public function show(Request $request, Lab $lab)
    {
        $lab->load('barangs');

        if ($request->wantsJson()) {
            return response()->json($lab);
        }

        // Redirect to edit since you don’t have labs/show.blade.php
        return redirect()->route('labs.edit', $lab);
    }
}
