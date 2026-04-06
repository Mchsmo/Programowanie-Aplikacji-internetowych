<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'loan-calculator')->name('home');

Volt::route('/kalkulator', 'loan-calculator')
    ->name('calculator');

require __DIR__.'/auth.php';
