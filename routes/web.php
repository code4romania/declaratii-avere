<?php

declare(strict_types=1);

use App\Filament\Pages\Welcome;
use App\Http\Middleware\SetSeoDefaults;
use App\Livewire\Pages;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/{user:ulid}', Welcome::class)
    ->middleware('guest')
    ->name('auth.welcome');

Route::as('front.')
    ->middleware(SetSeoDefaults::class)
    ->group(function () {
        Route::get('/', Pages\Home::class)->name('index');
        Route::get('/p/{person:slug}', Pages\Profile::class)->name('profile');
    });
