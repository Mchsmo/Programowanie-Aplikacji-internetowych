<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kredyt extends Model
{
    protected $table = 'kredyty';
    
    protected $fillable = [
        'user_id',
        'kwota',
        'procent',
        'lata',
        'rata_miesieczna',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}