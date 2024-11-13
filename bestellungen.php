<?php
session_start();

// Bestellung löschen, wenn Lösch-Button geklickt wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $index = (int)$_POST['delete'];
    if (isset($_SESSION['bestellungen'][$index])) {
        unset($_SESSION['bestellungen'][$index]);
        $_SESSION['bestellungen'] = array_values($_SESSION['bestellungen']); // Indizes neu ordnen
    }
}

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
            <?php echo count($_SESSION["bestellungen"]); ?>
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
                <th>Aktion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['bestellungen'] as $index => $bestellung): ?>
                <tr>
                    <td><?php echo htmlspecialchars($bestellung['gericht']); ?></td>
                    <td><?php echo $bestellung['menge']; ?></td>
                    <td><?php echo number_format($bestellung['preis'], 2); ?> €</td>
                    <td><?php echo number_format($bestellung['gesamtpreis'], 2); ?> €</td>
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="delete" value="<?php echo $index; ?>">
                            <button type="submit">Löschen</button>
                        </form>
                    </td>
                </tr>
                <?php $gesamtSumme += $bestellung['gesamtpreis']; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3 id ="gesamtsumme">Gesamtsumme: <?php echo number_format($gesamtSumme, 2); ?> €</h3>

    <button id="zur_kasse" onclick="window.location.href='kasse.php'">Zur Kasse</button>
</main>

</body>
</html>
