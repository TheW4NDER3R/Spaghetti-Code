<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaghetti-Code</title>
    <!-- Verknüpfung zur externen CSS-Datei -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/styles_menu.css">
</head>
<body>
    <!-- Navigationsleiste -->
    <nav>
        <a href="./index.php">
            <img src="./web_images/logo.png" alt="Logo"> <!-- Logo mit Link -->
        </a>
        <a href="./menukarte.php">Menükarte</a>
        <a href="./kontakt.php">Kontakt</a>
        <a href="./login.php">Login</a>
        <a href="./impressum.php">Impressum</a>
    </nav>

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
                <button class="order-button">Bestellen</button>
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
                <button class="order-button">Bestellen</button>
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
                <button class="order-button">Bestellen</button>
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
                <button class="order-button">Bestellen</button>
            </div>
        </main>
    </section>
</body>
</html>
