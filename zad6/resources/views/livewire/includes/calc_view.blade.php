<section>
    <header>
        <h2>Parametry kredytu</h2>
    </header>
    <form wire:submit.prevent="oblicz">
        <div class="row gtr-uniform">
            <div class="col-12">
                <label for="kwota">Kwota kredytu (PLN)</label>
                <input type="text" wire:model="kwota" id="kwota" placeholder="np. 50000" />
                @error('kwota') <span style="color: #f56a6a; font-weight: bold; display: block; margin-top: 0.5em;">{{ $message }}</span> @enderror
            </div>

            <div class="col-6 col-12-xsmall">
                <label for="procent">Oprocentowanie (%)</label>
                <input type="text" wire:model="procent" id="procent" placeholder="7.5" />
                @error('procent') <span style="color: #f56a6a; font-weight: bold; display: block; margin-top: 0.5em;">{{ $message }}</span> @enderror
            </div>

            <div class="col-6 col-12-xsmall">
                <label for="lata">Liczba lat</label>
                <input type="text" wire:model="lata" id="lata" placeholder="5" />
                @error('lata') <span style="color: #f56a6a; font-weight: bold; display: block; margin-top: 0.5em;">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <ul class="actions">
                    <li><button type="submit" class="button primary">Oblicz ratę</button></li>
                    <li><button type="button" wire:click="resetuj" class="button">Resetuj</button></li>
                </ul>
            </div>
        </div>
    </form>
</section>