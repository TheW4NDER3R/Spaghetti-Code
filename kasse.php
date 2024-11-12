<?php
session_start();

if (!isset($_SESSION['bestellungen']) || empty($_SESSION['bestellungen'])) {
    echo "<h2>Ihr Warenkorb ist leer.</h2>";
    exit;
}

// Gesamtsumme berechnen
$gesamtSumme = 0;
foreach ($_SESSION['bestellungen'] as $bestellung) {
    $gesamtSumme += $bestellung['gesamtpreis'];
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezahlung</title>
    <link rel="stylesheet" href="./css/styles.css">
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

<main>
    <h2 id="zahlung">Bezahlung</h2>
    <p>Gesamtsumme: <strong><?php echo number_format($gesamtSumme, 2); ?> €</strong></p>

    <form action="zahlung_verarbeitung.php" method="POST">
        <h3>Wählen Sie Ihre Zahlungsmethode:</h3>

        <!-- Kreditkarte -->
        <div>
            <input type="radio" id="creditcard" name="payment_method" value="creditcard" required>
            <label for="creditcard">Kreditkarte (MasterCard, Visa)</label>
            <div>
                <label for="card_number">Kartennummer:</label>
                <input type="text" id="card_number" name="card_number" maxlength="16" placeholder="1234 5678 9012 3456">
            </div>
            <div>
                <label for="card_expiry">     Gültig bis:</label>
                <input type="month" id="card_expiry" name="card_expiry">
            </div>
            <div>
                <label for="card_cvc">CVC:</label>
                <input type="text" id="card_cvc" name="card_cvc" maxlength="3" placeholder="123">
            </div>
        </div>

        <!-- PayPal -->
        <div>
            <input type="radio" id="paypal" name="payment_method" value="paypal" required>
            <label for="paypal">PayPal</label>
        </div>

        <!-- Sofortüberweisung -->
        <div>
            <input type="radio" id="sofort" name="payment_method" value="sofort" required>
            <label for="sofort">Sofortüberweisung</label>
        </div>

        <button type="submit">Bezahlen</button>
    </form>
</main>
</body>
</html>
