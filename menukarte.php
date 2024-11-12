<?php
session_start();

// Initialisiere Bestellungen, wenn noch nicht vorhanden
if (!isset($_SESSION['bestellungen'])) {
    $_SESSION['bestellungen'] = [];
}

// Bestellung hinzufügen (falls Bestellung über POST angefordert wurde)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['gericht'], $_POST['menge'], $_POST['preis'])) {
    $gericht = $_POST['gericht'];
    $menge = (int)$_POST['menge'];
    $preis = (float)$_POST['preis'];

    // Bestellung speichern
    $_SESSION['bestellungen'][] = [
        'gericht' => $gericht,
        'menge' => $menge,
        'preis' => $preis,
        'gesamtpreis' => $menge * $preis,
    ];
}

// Anzahl der Bestellungen berechnen
$bestellAnzahl = count($_SESSION['bestellungen']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaghetti-Code</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/styles_menu.css">
    <script>
        let currentDish = "";
        let currentPrice = 0.0;

        function handleOrder(dishName, dishPrice) {
            currentDish = dishName;
            currentPrice = dishPrice;
            document.getElementById("orderModal").style.display = "flex";
        }

        function confirmOrder() {
            const quantity = document.getElementById("quantitySelect").value;

            // Erstelle ein verstecktes Formular und sende die Bestellung
            const form = document.createElement("form");
            form.method = "POST";
            form.action = "";

            const dishInput = document.createElement("input");
            dishInput.type = "hidden";
            dishInput.name = "gericht";
            dishInput.value = currentDish;
            form.appendChild(dishInput);

            const priceInput = document.createElement("input");
            priceInput.type = "hidden";
            priceInput.name = "preis";
            priceInput.value = currentPrice;
            form.appendChild(priceInput);

            const quantityInput = document.createElement("input");
            quantityInput.type = "hidden";
            quantityInput.name = "menge";
            quantityInput.value = quantity;
            form.appendChild(quantityInput);

            document.body.appendChild(form);
            form.submit();
        }

        function closeModal() {
            document.getElementById("orderModal").style.display = "none";
        }
    </script>
</head>
<body>
    <header class="header">
        <a id="logo" href="./index.php">
            <img src="./web_images/logo.png" alt="Logo">
        </a>
        <h1 id="header">Spaghetti-Code</h1>
        <nav>
            <a href="./index.php">Startseite</a>
            <a href="./menukarte.php">Menükarte</a>
            <a href="./kontakt.php">Kontakt</a>
            <a href="./impressum.php">Impressum</a>
            <a id="login" href="./login.php">Anmelden</a>
            <a id="servieren" href="./bestellungen.php">
                <img src="./web_images/essen_servieren.png" alt="Warenkorb">
                <?php echo count($_SESSION ["bestellungen"])?>
            </a>
        </nav>
    </header>

    <section id="menu">
        <h2>Menükarte</h2>
        <main>
            <!-- Gericht 1 -->
            <div class="container">
                <div class="image-container">
                    <img src="./web_images/gerichte/gericht1_spaghetti_bolognese.png" alt="picture of spaghetti bolognese">
                    <div class="overlay">
                        <div class="text">
                            <span>Spaghetti Bolognese</span>
                            <div class="price">12,20 €</div>
                        </div>
                    </div>
                </div>
                <button class="order-button" onclick="handleOrder('Spaghetti Bolognese', 12.20)">Bestellen</button>
            </div>

            <!-- Gericht 2 -->
            <div class="container">
                <div class="image-container">
                    <img src="./web_images/gerichte/gericht2_spaghetti_carbonara.png" alt="picture of spaghetti carbonara">
                    <div class="overlay">
                        <div class="text">
                            <span>Spaghetti Carbonara</span>
                            <div class="price">12,20 €</div>
                        </div>
                    </div>
                </div>
                <button class="order-button" onclick="handleOrder('Spaghetti Carbonara', 12.20)">Bestellen</button>
            </div>

            <!-- Gericht 3 -->
            <div class="container">
                <div class="image-container">
                    <img src="./web_images/gerichte/gericht3_spaghetti_salat.png" alt="picture of spaghetti salad">
                    <div class="overlay">
                        <div class="text">
                            <span>Spaghetti Salat</span>
                            <div class="price">10,20 €</div>
                        </div>
                    </div>
                </div>
                <button class="order-button" onclick="handleOrder('Spaghetti Salat', 10.20)">Bestellen</button>
            </div>

            <!-- Gericht 4 -->
            <div class="container">
                <div class="image-container">
                    <img src="./web_images/gerichte/gericht4_spaghetti_eis.png" alt="picture of spaghetti ice cream">
                    <div class="overlay">
                        <div class="text">
                            <span>Spaghetti Eis</span>
                            <div class="price">7,80 €</div>
                        </div>
                    </div>
                </div>
                <button class="order-button" onclick="handleOrder('Spaghetti Eis', 7.80)">Bestellen</button>
            </div>
        </main>
    </section>

    <!-- Modal für Menge -->
    <div id="orderModal" style="display: none;">
        <div id="modalContent">
            <h3>Wie viele Portionen möchten Sie bestellen?</h3>
            <select id="quantitySelect">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <button onclick="confirmOrder()">Bestätigen</button>
            <button onclick="closeModal()">Abbrechen</button>
        </div>
    </div>
</body>
</html>
