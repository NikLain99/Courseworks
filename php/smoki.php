<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<style>
    .block {
        display: block;
    }

    .hidden {
        display: none;
    }


    .container {
        display: flex;
    }
</style>

<header>
    <h2>Poznaj smoki!</h2>
</header>

<div class="container">

    <nav>
        <button type="button" onclick="showBlock('block1')">Baza</button>
        <button type="button" onclick="showBlock('block2')">Opisy</button>
        <button type="button" onclick="showBlock('block3')">Galeria</button>
    </nav>

    <main>

        <!-- Sekcja 1: Baza Smoków -->
        <section id="block1" class='block'>
            <h3>Baza Smoków</h3>
            <?php
            $polaczenie = mysqli_connect("mysql", "NikLain", "1212", "smoki");
            if (!$polaczenie) {
                die("Błąd połączenia: " . mysqli_connect_error());
            }
            ?>

            <form action="smoki.php" method="post">
                <select name="kraj">
                    <?php
                    $wynik2 = mysqli_query($polaczenie, "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie");
                    if (!$wynik2) {
                        echo "<option>" . mysqli_error($polaczenie) . "</option>";
                    }
                    while ($wiersz = mysqli_fetch_row($wynik2)) {
                        echo "<option value=\"" . $wiersz[0] . "\">" . $wiersz[0] . "</option>";
                    }
                    ?>
                </select>
                <button type="submit" name="szukaj">Szukaj</button>
            </form>

            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php
                    // Skrypt 2 – wypełnia tabelę wynikami (zmodyfikowane zapytanie 1)
                    if (isset($_POST["szukaj"])) {
                        $wybranyKraj = $_POST["kraj"];
                        $zapytanie1 = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie = '$wybranyKraj'";
                        $wynik1 = mysqli_query($polaczenie, $zapytanie1);
                        while ($wiersz = mysqli_fetch_row($wynik1)) {
                            echo "<tr>";
                            echo "<td>" . $wiersz[0] . "</td>";
                            echo "<td>" . $wiersz[1] . "</td>";
                            echo "<td>" . $wiersz[2] . "</td>";
                            echo "</tr>";
                        }
                        mysqli_close($polaczenie);
                    }
                ?>
            </table>
        </section>

        <!-- Sekcja 2: Opisy smoków -->
        <section id="block2" class="block hidden">
            <h3>Opisy smoków</h3>
            <dl>
                <!-- Zawartość skopiowana z pliku opis.txt -->
                <dt>Smok Wawelski</dt>
                <dd>Legendarny smok zamieszkujący jaskinię pod Wzgórzem Wawelskim w Krakowie. Znany z upodobania do owiec i młodych dziewcząt. Pokonany przez szewczyka Skubę.</dd>

                <dt>Smok Czerwony</dt>
                <dd>Potężny smok o ognistoczerwonej łusce. Pochodzi z południa Europy. Znany ze swojej agresywności i niezwykłej siły. Długość ciała dochodzi do 15 metrów.</dd>

                <dt>Smok Wielki</dt>
                <dd>Jeden z największych smoków w historii. Jego rozpiętość skrzydeł przekracza 20 metrów. Żyje w górskich jaskiniach i żywi się dzikimi zwierzętami.</dd>

                <dt>Skrzydlaty Łaciaty</dt>
                <dd>Rzadki gatunek smoka o charakterystycznym, łaciatym ubarwieniu. Mimo groźnego wyglądu jest stosunkowo spokojny. Zamieszkuje lasy i podmokłe tereny.</dd>
            </dl>
        </section>

        <!-- Sekcja 3: Galeria -->
        <section id="block3" class="block hidden">
            <h3>Galeria</h3>
            <img src="smok1.jpg" alt="Smok czerwony" style="height:300px;">
            <img src="smok2.jpg" alt="Smok wielki">
            <img src="smok3.jpg" alt="Skrzydlaty łaciaty">
        </section>

    </main>

</div>

<footer>
    <p>Stronę opracował: asdfsadfasdf </p>
</footer>

<script>
    function showBlock(id) {
        document.querySelectorAll('.block').forEach(el => {
            el.classList.add('hidden');
        });

        document.getElementById(id).classList.remove('hidden');
   }
</script>

</body>
</html>
