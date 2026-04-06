<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class LoanCalculator extends Component
{
    public $kwota = '';
    public $procent = '';
    public $lata = '';
    public $wynik_raty = null;
    public $pokazuj_tytul = true;

    protected function rules()
    {
        return [
            'kwota' => 'required|numeric|min:1',
            'procent' => 'required|numeric|min:0.1',
            'lata' => 'required|integer|min:1',
        ];
    }

    protected $messages = [
        'kwota.required' => 'Proszę podać kwotę kredytu.',
        'kwota.numeric' => 'Kwota musi być liczbą.',
        'procent.required' => 'Podaj oprocentowanie.',
        'lata.required' => 'Podaj liczbę lat.',
        'lata.integer' => 'Liczba lat musi być liczbą całkowitą.',
    ];

    public function oblicz()
    {
        $this->validate();

        $procent_miesieczny = ($this->procent / 100) / 12;
        $liczba_rat = $this->lata * 12;
        
        if ($procent_miesieczny == 0) {
            $this->wynik_raty = $this->kwota / $liczba_rat;
        } else {
            $this->wynik_raty = $this->kwota * $procent_miesieczny / (1 - pow(1 + $procent_miesieczny, -$liczba_rat));
        }

        $this->pokazuj_tytul = false;
    }

    public function resetuj()
    {
        $this->reset(['kwota', 'procent', 'lata', 'wynik_raty']);
        $this->resetValidation();
        $this->pokazuj_tytul = true;
    }

    public function render()
    {
        return view('livewire.loan-calculator');
    }
}