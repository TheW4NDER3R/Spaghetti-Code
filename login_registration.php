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
    <!-- Navigationsleiste -->
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
            <span id="bestellanzahl">(<?php echo $bestellAnzahl; ?>)</span>
        </a>
    </nav>
    </header>

    <!-- Registrierungsbereich -->
    <section id="register">
        <h2>Registrieren</h2>
        <form action="/register" method="POST">
    <div class="form-group-row">
        <div class="form-group">
            <label for="reg-vorname">Vorname:</label>
            <input type="text" id="reg-vorname" name="vorname" placeholder="Deine Vorname" required>
        </div>
        <div class="form-group">
            <label for="reg-nachname">Nachname:</label>
            <input type="text" id="reg-nachname" name="nachname" placeholder="Deine Nachname" required>
        </div>
    </div>

    <div class="form-group-row">
        <div class="form-group">
            <label for="reg-straße">Straße:</label>
            <input type="text" id="reg-straße" name="straße" placeholder="Deine Straße" required>
        </div>
        <div class="form-group">
            <label for="reg-hausnummer">Hausnummer:</label>
            <input type="text" id="reg-hausnummer" name="hausnummer" placeholder="Deine Hausnummer" required>
        </div>
    </div>

    <div class="form-group-row">
        <div class="form-group">
            <label for="reg-plz">PLZ:</label>
            <input type="number" id="reg-plz" name="plz" placeholder="Deine PLZ" required>
        </div>
        <div class="form-group">
            <label for="reg-stadt">Stadt:</label>
            <input type="text" id="reg-stadt" name="stadt" placeholder="Deine Stadt" required>
        </div>
    </div>

    <div class="form-group-row">
        <div class="form-group">
            <label for="reg-email">E-Mail-Adresse:</label>
            <input type="email" id="reg-email" name="email" placeholder="Deine E-Mail-Adresse" required>
        </div>
        <div class="form-group">
            <label for="reg-telefon">Telefon:</label>
            <input type="number" id="reg-telefon" name="telefon" placeholder="Deine Telefonnummer" required>
        </div>
    </div>

    <label for="reg-password">Passwort:</label>
    <input type="password" id="reg-password" name="password" placeholder="Erstelle ein Passwort" required>
    
    <label for="confirm-password">Passwort bestätigen:</label>
    <input type="password" id="confirm-password" name="confirm_password" placeholder="Passwort bestätigen" required>
    
    <button type="submit">Registrieren</button>
</form>


    </section>
</body>
</html>
