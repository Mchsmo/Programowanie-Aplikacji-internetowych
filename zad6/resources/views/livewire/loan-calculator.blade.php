<div id="wrapper">
    {{-- STRONA TYTUŁOWA --}}
    @if($pokazuj_tytul)
        <header id="header" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/pic16.jpg') }}'); background-size: cover; background-position: center; color: white; padding: 2em; text-align: center;">
            <div class="inner">
                <h1 style="font-size: 3.5em; color: white; border: none; margin-bottom: 0.5em;">Kalkulator Kredytowy</h1>
                <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded text-sm text-blue-800">
                    Zalogowany jako: <strong>{{ Auth::user()->name }}</strong>
                    (rola: <strong>{{ $rolaNazwa }}</strong>) —
                    maksymalna kwota kredytu:
                    <strong>{{ number_format($maxKwota, 0, ',', ' ') }} zł</strong>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">
                        Wyloguj
                    </button>
                </form>
                <ul class="actions" style="justify-content: center; display: flex;">
                    <li><a href="#main" class="button primary large">Zacznij liczyć</a></li>
                </ul>
            </div>
        </header>
    @endif

    <div id="main" style="padding-top: 4em;">
        <div class="inner">
            
            @include('livewire.includes.calc_view')

            {{-- WYNIK --}}
            @if($wynik_raty && !$pokazuj_tytul)
                <div class="box" style="margin-top: 3em; border-left: 10px solid #f56a6a; background: #f8f8f8;">
                    <h3 style="margin-bottom: 0.2em;">Twoja miesięczna rata wynosi:</h3>
                    <h2 style="font-size: 2.5em; color: #585858; font-weight: 900; border: none;">{{ number_format($wynik_raty, 2, ',', ' ') }} zł</h2>
                </div>
            @endif
        </div>
    </div>
    @if(count($historia) > 0)
        <div class="box" style="margin-top: 3em;">
            <h3>Historia obliczeń</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 2px solid #ddd; text-align: left;">
                        <th style="padding: 0.5em;">Kwota (PLN)</th>
                        <th style="padding: 0.5em;">Oprocentowanie</th>
                        <th style="padding: 0.5em;">Lata</th>
                        <th style="padding: 0.5em;">Rata miesięczna</th>
                        <th style="padding: 0.5em;">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historia as $kredyt)
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 0.5em;">{{ number_format($kredyt['kwota'], 2, ',', ' ') }} zł</td>
                            <td style="padding: 0.5em;">{{ $kredyt['procent'] }}%</td>
                            <td style="padding: 0.5em;">{{ $kredyt['lata'] }}</td>
                            <td style="padding: 0.5em;"><strong>{{ number_format($kredyt['rata_miesieczna'], 2, ',', ' ') }} zł</strong></td>
                            <td style="padding: 0.5em;">{{ \Carbon\Carbon::parse($kredyt['created_at'])->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <footer id="footer">
        <div class="inner">
            @if(!$wynik_raty && $pokazuj_tytul)
                <section style="text-align: center;">
                    <ul class="actions">
                        <li><a href="#header" class="button small">Wróć na górę</a></li>
                    </ul>
                </section>
            @endif
            <ul class="copyright">
                <li>Kalkulator Kredytowy</li>
                <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </footer>
</div>