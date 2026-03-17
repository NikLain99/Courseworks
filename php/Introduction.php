<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $liczba = 18;
    if ($liczba % 2 == 0) {
        echo "Liczba jest parzysta";
    } else {
        echo "Liczba jest nieparzysta";
    }
    ?>
    <?php
    $x = 3;
    $y = 4;
    $z = 5;

    $c = max($x, $y, $z);
    $a = min($x, $y, $z);
    $b = $x + $y + $z - $a - $c;

    if ($a * $a + $b * $b == $c * $c) {
        $obwod = $a + $b + $c;
        $pole = ($a + $b) / 2;
        echo "Trojkat prostokatny<br>";
        echo "Obwod: $obwod";
        echo "Pole: $pole";
    } else {
        echo "Trojkat nie jest pitagoraski";
    }
    ?>
    <?php
    $suma = 0;
    echo "Wylosowane liczby";
    for ($i = 0; $i < 10; $i++) {
        $liczba = rand(1, 20);
        echo $liczba , " ";
        $suma += $liczba;
    }
    $srednia = $suma / 10;
    echo "<br>Srednia: $srednia";
    ?>
    <?php
    echo "<br>nie jest parzysta i podzielna przez 3";
    $i = 0;
    while ($i <= 100) {
        $i++;
        if ($i % 2 != 0 && $i % 3 == 0) {
        echo $i, " ";
    }
    }
    ?>
</body>
</html>
