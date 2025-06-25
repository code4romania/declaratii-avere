<?php

declare(strict_types=1);

use App\Filament\Pages\Welcome;
use App\Http\Middleware\SetSeoDefaults;
use App\Livewire\Pages\Frontpage;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/{user:ulid}', Welcome::class)
    ->middleware('guest')
    ->name('auth.welcome');

Route::as('front.')
    ->middleware(SetSeoDefaults::class)
    ->group(function () {
        Route::get('/', Frontpage::class)->name('index');
    });
