<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Http\Requests\StoreAthleteRequest;
use App\Http\Requests\UpdateAthleteRequest;
use App\Models\Achievement;
use Illuminate\Support\Facades\Storage;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');

        $athletes = Athlete::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->orderBy('id')
            ->paginate(12)
            ->withQueryString();

        return view('athletes.index', [
            'athletes' => $athletes,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('athletes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAthleteRequest $request)
    {
        $validated = $request->validated();

        $athlete = Athlete::create($validated);
        $filename = $request->file('photo')->store('media/photos');
        $athlete->photo = $filename;
        $athlete->save();

        return redirect()
            ->route('athletes.show', $athlete)
            ->with('success', 'Athlete profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Athlete $athlete)
    {
        $search = request('search');

        $achievements = Achievement::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })
            ->whereHas('athlete', function ($query) use ($athlete) {
                return $query->where('id', $athlete->id);
            })
            ->orderBy('id')
            ->paginate(12)
            ->withQueryString();

        return view('athletes.show', [
            'athlete' => $athlete,
            'achievements' => $achievements,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Athlete $athlete)
    {
        return view('athletes.edit', [
            'athlete' => $athlete,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAthleteRequest $request, Athlete $athlete)
    {
        $validated = $request->validated();
        $athlete->update($validated);

        if ($request->hasFile('photo')) {
            if ($athlete->photo) Storage::delete($athlete->photo);

            $filename = $request->file('photo')->store('media/photos');
            $athlete->photo = $filename;
            $athlete->save();
        }

        return redirect()
            ->route('athletes.show', $athlete)
            ->with('success', 'Athlete profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return redirect()
            ->route('athletes.index')
            ->with('success', 'Athlete profile deleted successfully.');
    }
}
