<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AthleteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $features = [
        [
            'icon' => 'bike',
            'title' => 'Athlete Tracking',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aut.',
        ],
        [
            'icon' => 'trophy',
            'title' => 'Achievement Tracking',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aut.',
        ],
        [
            'icon' => 'user-round',
            'title' => 'User Management',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, aut.',
        ],
    ];

    return view('welcome', [
        'features' => $features,
    ]);
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('athletes.index');
    })->name('dashboard');

    Route::resource('athletes', AthleteController::class);
    Route::resource('athletes.achievements', AchievementController::class)->except(['index', 'show']);
});

require __DIR__ . '/auth.php';
