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
        <a id="login" href="./login.php">Login</a>
        <a id="servieren" href="./index.php">
        <img  src="./web_images/essen_servieren.png" alt="Logo"> <!-- Logo mit Link -->
        </a>
    </nav>
    </header>

    <!-- Login-Bereich -->
    <section id="login">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <label for="email">E-Mail-Adresse:</label>
            <input type="email" id="email" name="email" placeholder="Deine E-Mail-Adresse" required>
            
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" placeholder="Dein Passwort" required>
            
            <button type="submit">Anmelden</button>
        </form>
        <p>Kein Konto? <a href="./login_registration.php">Hier registrieren</a></p>
    </section>


</body>
</html>
