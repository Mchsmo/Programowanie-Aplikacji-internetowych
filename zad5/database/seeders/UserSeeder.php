<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Menadzer',
            'email'    => 'menadzer@firma.pl',
            'password' => Hash::make('menadzer'),
            'role'     => 'menadzer',
        ]);

        User::create([
            'name'     => 'Pracownik',
            'email'    => 'pracownik@firma.pl',
            'password' => Hash::make('pracownik'),
            'role'     => 'pracownik',
        ]);
    }
}