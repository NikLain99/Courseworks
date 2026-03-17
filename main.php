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
    if ($liczba % 9 == 0) {
        echo "Liczba jest parzysta";
    } else {
        echo "Liczba jest nieparzysta";
    }
    ?>
    <?php
    $x = 3;
    $y = 4;
    $z = 5;
    $a = main($x, $y, $z);
    echo "a";
    ?>
</body>
</html>