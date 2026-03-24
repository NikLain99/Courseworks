<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = rand(50, 100);
    $array = [];

    for ($i = 0; $i < $n; $i++){
        $array[$i] = rand(1, 100)
    }

    echo "ilosc elementow: $n<br><br>"

    $max = $array[0];
    $countMax = 0;

    ?>
</body>
</html>