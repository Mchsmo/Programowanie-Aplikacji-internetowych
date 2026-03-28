<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator oprocentowania kredytu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <style>
        .content { margin: 2em; }
        .result-box { margin-top: 1em; padding: 1em; border-radius: 4px; background: #e7f3fe; color: #31708f; }
        .error-box { margin-top: 1em; padding: 1em; border-radius: 4px; background: #f2dede; color: #a94442; }
    </style>
</head>
<body>

<div class="content">
    <h2 class="content-head">Kalkulator Kredytowy</h2>

    <form method="post" action="calc.php" class="pure-form pure-form-stacked">
        <fieldset>
            <label for="id_kwota">Kwota kredytu:</label>
            <input id="id_kwota" type="text" name="kwota" placeholder="np. 10000" value="<?php echo $kwota ?? ''; ?>">

            <label for="id_oprocentowanie">Oprocentowanie (%):</label>
            <input id="id_oprocentowanie" type="text" name="oprocentowanie" list="oprocentowanie_lista" value="<?php echo $oprocentowanie ?? ''; ?>">
            <datalist id="oprocentowanie_lista">
                <option value="3">
                <option value="5">
                <option value="7">
                <option value="10">
            </datalist>

            <label for="id_lata">Liczba lat:</label>
            <input id="id_lata" type="text" name="lata" value="<?php echo $lata ?? ''; ?>">

            <br>
            <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
        </fieldset>
    </form>

    <?php
    // Wyświetlanie błędów
    if (!empty($messages)) {
        echo '<div class="error-box"><ul>';
        foreach ($messages as $msg) {
            echo "<li>$msg</li>";
        }
        echo '</ul></div>';
    }

    // Wyświetlanie wyniku
    if (isset($result)) {
        echo '<div class="result-box">';
        echo "Miesięczna rata: <b>" . round($result, 2) . " zł</b>";
        echo '</div>';
    }
    ?>
</div>

</body>
</html>