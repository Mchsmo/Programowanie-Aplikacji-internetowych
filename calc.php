<?php
$messages = [];

// 1. Pobranie parametrów
$kwota = $_REQUEST['kwota'] ?? null;
$oprocentowanie = $_REQUEST['oprocentowanie'] ?? null;
$lata = $_REQUEST['lata'] ?? null;

// 2. Walidacja parametrów
if (!isset($kwota, $oprocentowanie, $lata)) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($kwota == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}

if ($oprocentowanie == "") {
    $messages[] = 'Nie podano oprocentowania';
}

if ($lata == "") {
    $messages[] = 'Nie podano planowanego czasu spłaty kredytu';
}

if (empty($messages)) {

    if (!is_numeric($kwota)) {
        $messages[] = 'Kwota kredytu nie jest liczbą';
    }

    if (!is_numeric($lata)) {
        $messages[] = 'Czas trwania kredytu nie jest liczbą';
    }

    if (!is_numeric($oprocentowanie)) {
        $messages[] = 'Oprocentowanie musi być liczbą';
    }
	
	if ($kwota < 0) {
        $messages[] = 'Kwota kredytu nie może być ujemna';
    }

    if ($lata <= 0) {
        $messages[] = 'Liczba lat musi być większa od zera';
    }

    if ($oprocentowanie < 0) {
        $messages[] = 'Oprocentowanie nie może być ujemne';
    }
}

if (empty($messages)) {

    // konwersja
    $kwota = floatval($kwota);
    $lata = intval($lata);
    $oprocentowanie = floatval($oprocentowanie);

    $liczba_rat = $lata * 12;

    if ($oprocentowanie != 0) {

        $op_mies = $oprocentowanie / (12 * 100);

        $rata = $kwota * (
            ($op_mies * pow(1 + $op_mies, $liczba_rat)) /
            (pow(1 + $op_mies, $liczba_rat) - 1)
        );

    } else {
        $rata = $kwota / $liczba_rat;
    }

    $result = $rata;
}

include 'calc_view.php';
?>