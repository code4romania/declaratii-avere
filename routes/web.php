<?php

declare(strict_types=1);

use App\Filament\Pages\Welcome;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetSeoDefaults;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/{user:ulid}', Welcome::class)
    ->middleware('guest')
    ->name('auth.welcome');

Route::as('front.')
    ->middleware(SetSeoDefaults::class)
    ->group(function () {
        Route::get('/', HomeController::class)->name('index');

        Route::redirect('/p/{person:slug}', '/p/{person:slug}/avere')->name('profile');

        Route::get('/p/{person:slug}/avere/{statement?}', [ProfileController::class, 'assets'])->name('profile.assets');
        Route::get('/p/{person:slug}/interese/{statement?}', [ProfileController::class, 'interests'])->name('profile.interests');

        Route::view('/terms', 'pages.terms')->name('page.terms');
    });
