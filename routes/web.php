<?php

declare(strict_types=1);

use App\Filament\Pages\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/{user:ulid}', Welcome::class)->name('auth.welcome');
