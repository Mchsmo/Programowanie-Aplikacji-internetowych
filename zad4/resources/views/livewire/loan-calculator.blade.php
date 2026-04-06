<div id="wrapper">
    {{-- STRONA TYTUŁOWA --}}
    @if($pokazuj_tytul)
        <header id="header" style="height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/pic16.jpg') }}'); background-size: cover; background-position: center; color: white; padding: 2em; text-align: center;">
            <div class="inner">
                <h1 style="font-size: 3.5em; color: white; border: none; margin-bottom: 0.5em;">Kalkulator Kredytowy</h1>
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