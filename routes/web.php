<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\SetLocale;
use Inertia\Inertia;

// Route pour changer la langue (en dehors du middleware)
Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'fr'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

// Routes principales, protégées par le middleware
Route::middleware([SetLocale::class])->group(function () {

    Route::get('/', function () {
        return redirect()->route('tasks.index');
    })->name('home');

    Route::resource('tasks', TaskController::class)->only([
        'index',
        'show',
        'create',
        'store',
        'edit',
        'update',
        'destroy',
    ])->parameters([
        'tasks' => 'task'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
