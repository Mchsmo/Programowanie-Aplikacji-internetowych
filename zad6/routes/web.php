<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', fn() => redirect()->route('calculator'));

Route::get('/dashboard', fn() => redirect()->route('calculator'))
    ->name('dashboard');


Volt::route('/kalkulator', 'loan-calculator')
    ->middleware(['auth'])
    ->name('calculator');

Route::get('/', function() {
    return auth()->check() 
        ? redirect()->route('calculator') 
        : redirect()->route('login');
});

require __DIR__.'/auth.php';