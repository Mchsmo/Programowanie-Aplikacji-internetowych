<!DOCTYPE HTML>
<head>
<meta charset="utf-8" />
<title>Kalkulator oprocentowania kredytu</title>
</head>

<body>

<form method="post" action="calc.php">

    <label>Kwota kredytu:</label>
    <input type="text" name="kwota" value="<?php echo $kwota ?? ''; ?>">

    <br><br>

    <label>Oprocentowanie (%):</label>
    <input type="text" name="oprocentowanie" list="oprocentowanie_lista" value="<?php echo $oprocentowanie ?? ''; ?>">

    <datalist id="oprocentowanie_lista">
        <option value="3">
        <option value="5">
        <option value="7">
        <option value="10">
    </datalist>

    <br><br>

    <label>Liczba lat:</label>
    <input type="text" name="lata" value="<?php echo $lata ?? ''; ?>">

    <br><br>

    <input type="submit" value="Oblicz">

</form>

<?php

if (!empty($messages)) {
    echo '<div class="errors"><ul>';
    foreach ($messages as $msg) {
        echo "<li>$msg</li>";
    }
    echo '</ul></div>';
}

if (isset($result)) {
    echo '<div class="result">';
    echo "Miesięczna rata: <b>" . round($result,2) . " zł</b>";
    echo '</div>';
}

?>

</body>
</html>