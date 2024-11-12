<?php
session_start();

if (!isset($_SESSION['bestellungen']) || empty($_SESSION['bestellungen'])) {
    echo "<h2>Ihr Warenkorb ist leer.</h2>";
    exit;
}

$gesamtSumme = 0;
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellübersicht</title>
    <link rel="stylesheet" href="./css/styles.css">
<style>

</style>

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
            <a id="login" href="./login.php">Login</a>
            <a id="servieren" href="./bestellungen.php">
                <img src="./web_images/essen_servieren.png" alt="Warenkorb">
                <?php echo count($_SESSION ["bestellungen"])?>
            </a>
        </nav>
    </header>

<main>
    <h2 id="bestellungen">Ihre Bestellungen</h2>
    <table>
        <thead>
            <tr>
                <th>Gericht</th>
                <th>Menge</th>
                <th>Preis pro Stück (€)</th>
                <th>Gesamt (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['bestellungen'] as $bestellung): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bestellung['gericht']); ?></td>
                    <td><?php echo $bestellung['menge']; ?></td>
                    <td><?php echo number_format($bestellung['preis'], 2); ?> €</td>
                    <td><?php echo number_format($bestellung['gesamtpreis'], 2); ?> €</td>
                </tr>
                <?php $gesamtSumme += $bestellung['gesamtpreis']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Gesamtsumme: <?php echo number_format($gesamtSumme, 2); ?> €</h3>
    
    <!-- Optional: Button zum Bestellen abschließen oder zur Kasse gehen -->
    <button onclick="window.location.href='kasse.php'">Zur Kasse</button>
</main>

</body>
</html>
