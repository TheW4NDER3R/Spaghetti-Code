<?php
session_start();

// Initialisiere Bestellungen, wenn noch nicht vorhanden
if (!isset($_SESSION['bestellungen'])) {
    $_SESSION['bestellungen'] = [];
}

// Bestellung hinzufügen, falls das Formular gesendet wurde
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

// Berechnung der Bestellanzahl für den Zähler
$bestellAnzahl = count($_SESSION['bestellungen']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaghetti-Code</title>
    <!-- Verknüpfung zur externen CSS-Datei -->
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <header class="header">
    <!-- Logo -->
        <a id="logo" href="./index.php">
        <img src="./web_images/logo.png" alt="Logo"> <!-- Logo mit Link -->
        </a>

    <!-- Resturant Name -->
        <h1 id="header">Spaghetti-Code</h1>
    
    <!-- Navigationsleiste -->
        <nav>

            <a href="./index.php">Stratseite</a>
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

    <!-- Hauptinhalt y -->
    <main>
        <section>
            <p>
                Willkommen im Spaghetti Code Restaurant! 🍝<br><br>
Hier verbinden sich kreative Ideen und wilde Ansätze – genau wie Spaghetti auf einem Teller:
<br><br> Ein bisschen unordentlich, aber immer voller Geschmack.
<br><br> Entdecken Sie unsere einzigartigen Gerichte, die von klassisch bis originell reichen,
und lassen Sie sich von der Vielfalt überraschen.
<br><br> Egal ob Spaghetti-Neuling oder echter Pasta-Profi –
bei uns finden Sie die perfekte Portion Genuss und Inspiration. 😊
            </p>
        </section>
    </main>
</body>
</html>
