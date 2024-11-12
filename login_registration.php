<?php
session_start();

// Datenbankverbindung
$dsn = 'mysql:host=localhost;dbname=spaghetti_code';
$user = 'spaghetti_code';
$pass = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    $conn = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}

if (isset($_POST['register'])) {
    try {
        // Formulardaten auslesen und Eingaben bereinigen
        $vorname = filter_input(INPUT_POST, 'vorname', FILTER_SANITIZE_STRING);
        $nachname = filter_input(INPUT_POST, 'nachname', FILTER_SANITIZE_STRING);
        $strasse = filter_input(INPUT_POST, 'strasse', FILTER_SANITIZE_STRING);
        $hausnummer = filter_input(INPUT_POST, 'hausnummer', FILTER_SANITIZE_STRING);
        $plz = filter_input(INPUT_POST, 'plz', FILTER_SANITIZE_STRING);
        $stadt = filter_input(INPUT_POST, 'stadt', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Eingaben validieren
        $errors = [];

        if (empty($vorname) || empty($nachname) || empty($email) || empty($password)) {
            $errors[] = "Bitte füllen Sie alle Pflichtfelder aus.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Bitte geben Sie eine gültige E-Mail-Adresse ein.";
        }

        if (strlen($password) < 8) {
            $errors[] = "Das Passwort muss mindestens 8 Zeichen lang sein.";
        }

        if ($password !== $confirm_password) {
            $errors[] = "Die Passwörter stimmen nicht überein.";
        }

        // Prüfen, ob die E-Mail-Adresse bereits registriert ist
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Diese E-Mail-Adresse ist bereits registriert.";
        }

        if (empty($errors)) {
            // Zufälliges Salt generieren
            $salt = bin2hex(random_bytes(32));
            
            // Das Passwort mit dem Salt hashen
            $hashed_password = password_hash($password . $salt, PASSWORD_ARGON2ID, [
                'memory_cost' => 65536,
                'time_cost' => 4,
                'threads' => 3
            ]);

            // SQL-Anweisung zum Einfügen des neuen Nutzers
            $sql = "INSERT INTO users (
                        vorname, nachname, strasse, hausnummer,
                        plz, stadt, email, telefon,
                        password, salt, created_at
                    ) VALUES (
                        :vorname, :nachname, :strasse, :hausnummer,
                        :plz, :stadt, :email, :telefon,
                        :password, :salt, NOW()
                    )";

            $stmt = $conn->prepare($sql);
            
            // Ausführen mit benannten Parametern
            $stmt->execute([
                ':vorname' => $vorname,
                ':nachname' => $nachname,
                ':strasse' => $strasse,
                ':hausnummer' => $hausnummer,
                ':plz' => $plz,
                ':stadt' => $stadt,
                ':email' => $email,
                ':telefon' => $telefon,
                ':password' => $hashed_password,
                ':salt' => $salt
            ]);

            // Erfolgsmeldung setzen und weiterleiten
            $_SESSION['success'] = "Registrierung erfolgreich! Sie können sich jetzt einloggen.";
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['errors'] = $errors;
        }
    } catch (PDOException $e) {
        $_SESSION['errors'] = ["Ein Fehler ist aufgetreten: " . $e->getMessage()];
    }
}
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
            <a id="login" href="./login.php">Anmelden</a>
            <a id="servieren" href="./bestellungen.php">
                <img src="./web_images/essen_servieren.png" alt="Warenkorb">
                <?php echo count($_SESSION ["bestellungen"])?>
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
