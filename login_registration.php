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
            <a id="servieren" href="./index.php">
            <img  src="./web_images/essen_servieren.png" alt="Logo"> <!-- Logo mit Link -->
            </a>
            <a id="login" href="./login.php">Login</a>
        </nav>
    </header>

    <!-- Registrierungsbereich -->
    <section id="register">
        <h2>Registrieren</h2>
        <form action="/register" method="POST">
            <label for="reg-email">E-Mail-Adresse:</label>
            <input type="email" id="reg-email" name="email" placeholder="Deine E-Mail-Adresse" required>
            
            <label for="reg-password">Passwort:</label>
            <input type="password" id="reg-password" name="password" placeholder="Erstelle ein Passwort" required>
            
            <label for="confirm-password">Passwort bestätigen:</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Passwort bestätigen" required>
            
            <button type="submit">Registrieren</button>
        </form>
    </section>
</body>
</html>
