<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php 
        $conn = mysqli_connect('localhost', 'root', '', 'smoki');
    ?>
    <header>
        <h2>Poznaj Smoki!</h2>
    </header>
    <main>
        <nav>
            <button id="button-baza" onclick="showBlock('baza', 'button-baza')">Baza</button>
            <button id="button-opis" onclick="showBlock('opis', 'button-opis')">Opisy</button>
            <button id="button-galeria" onclick="showBlock('galeria', 'button-galeria')">Galeria</button>
        </nav>
        <section class="block" id="baza">
            <h3>Baza Smoków</h3>
            <form action="smoki.php" method="POST">
                <select name="country" id="country">
                    <?php
                        $sql = "SELECT DISTINCT pochodzenie FROM smok ORDER BY pochodzenie";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['pochodzenie'] . "'>" . $row['pochodzenie'] . "</option>";
                        }
                    ?>
                </select>
                <button type="submit" name="search">Zsukaj</button>
            </form>
            <table>
                <tr>
                    <th>Nazwa</th>
                    <th>Długość</th>
                    <th>Szerokość</th>
                </tr>
                <?php 
                    if(isset($_POST['search'])) {
                        $country = $_POST['country'];
                        $sql = "SELECT nazwa, dlugosc, szerokosc FROM smok WHERE pochodzenie='$country'";
                        $result = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['nazwa'] . "</td>";
                            echo "<td>" . $row['dlugosc'] . "</td>";
                            echo "<td>" . $row['szerokosc'] . "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
        </section>
        <section class="block hidden" id="opis">
            <h3>Opis Smoków</h3>
            <h4>Smok czerwony</h4>
            <p>
                Smok czerwony to potężna istota, która jest symbolem siły i mocy. Jego łuski są intensywnie czerwone, a ogień, który zionie z jego paszczy, jest niezwykle gorący. Czerwone smoki są często przedstawiane jako strażnicy skarbów lub jako groźni przeciwnicy dla bohaterów w legendach i mitologiach.
            </p>
            
            <h4>Smok zielony</h4>
            <p>
                Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.
            </p>
        </section>
        <section class="block hidden" id="galeria">
            <h3>Galeria Smoków</h3>
        </section>
    </main>
    <footer>
        <p>
            Stronę opracował: Nikita K
        </p>
    </footer>
    <script>
        const showBlock = (id, buttonId) => {
            document.querySelectorAll('.block').forEach(block => {
                block.classList.add('hidden');
            });

            document.getElementById(buttonId).style.backgroundColor = 'mistyrose';
            document.querySelectorAll('nav button').forEach(button => {
                if(button.id !== buttonId) {
                    button.style.backgroundColor = '';
                }
            });

            document.getElementById(id).classList.remove('hidden');
        };
    </script>
    <?php 
        mysqli_close($conn);
    ?>
</body>
</html>