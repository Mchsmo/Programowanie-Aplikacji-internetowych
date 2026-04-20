<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Kredyt;

#[Layout('layouts.kalkulator')]
class LoanCalculator extends Component
{
    public $kwota = '';
    public $procent = '';
    public $lata = '';
    public $wynik_raty = null;
    public $pokazuj_tytul = true;
    public $maxKwota = 0;      // limit zależny od roli
    public $rolaNazwa = '';    // do wyświetlenia w widoku

    public $historia = [];

public function mount(): void
    {
        $user = Auth::user();

        $this->maxKwota = match($user->role) {
            'menadzer'  => 1_000_000,
            'pracownik' => 100_000,
            default     => 50_000,
        };

        $this->rolaNazwa = $user->role;
        
        // Załaduj historię przy starcie
        $this->historia = Kredyt::where('user_id', $user->id)
            ->latest()
            ->get()
            ->toArray();
    }



    protected function rules(): array
    {
        return [
            'kwota'   => "required|numeric|min:1|max:{$this->maxKwota}",
            'procent' => 'required|numeric|min:0.1',
            'lata'    => 'required|integer|min:1',
        ];
    }

    protected function messages(): array
    {
        return [
            'kwota.required' => 'Proszę podać kwotę kredytu.',
            'kwota.numeric'  => 'Kwota musi być liczbą.',
            'kwota.min'      => 'Kwota kredytu musi wynosić co najmniej 1 zł.',
            'kwota.max'      => "Twoja rola ({$this->rolaNazwa}) pozwala na maks. {$this->maxKwota} zł.",
            'procent.required' => 'Podaj oprocentowanie.',
            'procent.numeric'  => 'Oprocentowanie musi być liczbą.',
            'procent.min'      => 'Oprocentowanie musi wynosić co najmniej 0.1%.',
            'lata.required'  => 'Podaj liczbę lat.',
            'lata.integer'   => 'Liczba lat musi być liczbą całkowitą.',
            'lata.min'       => 'Liczba lat musi wynosić co najmniej 1.',
        ];
    }

    public function oblicz(): void
    {
        $this->validate();

        $procent_miesieczny = ($this->procent / 100) / 12;
        $liczba_rat = $this->lata * 12;

        if ($procent_miesieczny == 0) {
            $this->wynik_raty = $this->kwota / $liczba_rat;
        } else {
            $this->wynik_raty = $this->kwota * $procent_miesieczny
                / (1 - pow(1 + $procent_miesieczny, -$liczba_rat));
        }

        // Zapisz do bazy
        Kredyt::create([
            'user_id'         => Auth::id(),
            'kwota'           => $this->kwota,
            'procent'         => $this->procent,
            'lata'            => $this->lata,
            'rata_miesieczna' => $this->wynik_raty,
        ]);

        // Odśwież historię
        $this->historia = Kredyt::where('user_id', Auth::id())
            ->latest()
            ->get()
            ->toArray();

        $this->pokazuj_tytul = false;
    }

    public function resetuj(): void
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