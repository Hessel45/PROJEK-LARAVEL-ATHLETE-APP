<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Http\Requests\StoreAchievementRequest;
use App\Http\Requests\UpdateAchievementRequest;
use App\Models\Athlete;

class AchievementController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Athlete $athlete)
    {
        return view('achievements.create', [
            'athlete' => $athlete,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAchievementRequest $request, Athlete $athlete)
    {
        $validated = $request->validated();

        $athlete->achievements()->create($validated);

        return redirect()->route('athletes.show', $athlete)
            ->with('success', 'Achievement created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Athlete $athlete, Achievement $achievement)
    {
        return view('achievements.edit', [
            'achievement' => $achievement,
            'athlete' => $athlete,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAchievementRequest $request, Athlete $athlete, Achievement $achievement)
    {
        $validated = $request->validated();

        $achievement->update($validated);

        return redirect()->route('athletes.show', $athlete)
            ->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Athlete $athlete, Achievement $achievement)
    {
        $achievement->delete();

        return redirect()->route('athletes.show', $athlete)
            ->with('success', 'Achievement deleted successfully.');
    }
}
