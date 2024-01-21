<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = isset($_COOKIE['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Hotel Neptune</title>
</head>
<body>
    <?php
    require_once('./navbar.php');
    ?>
    
    <!-- Container = Site entier -->
    <div class="container">
        <header data-parallax="0.25">
            <div class="presentation">
                <h1>Hotel Netpune</h1>
                <h2>A la rencontre entre le luxe et la mer</h2>
                <form class="searchSuite">
                    <input class="searchbar" type="search" placeholder="Cherchez votre suite">
                    <button>Recherchez</button>
                </form>
            </div>
        </header>
        <section class="Section1 mainPageSect" data-parallax="0.1" data-offset="0">
            <div>
                <h1>Voyage Entre ciel et mer</h1>
                <p>
                    L'Hôtel Neptune, niché au cœur d'une île paradisiaque, incarne l'élégance et le luxe avec ses 5 étoiles scintillantes.
                    Immergé dans un environnement tropical idyllique, l'établissement offre une expérience unique alliant confort exceptionnel et service de première classe. 
                    Les visiteurs de l'Hôtel Neptune sont accueillis par des paysages à couper le souffle, des plages de sable fin et des eaux cristallines, créant une atmosphère de détente absolue.
                </p>
            </div>
        </section>
        <section class="Section2 mainPageSect">
        <h1>Votre voyage commence ici</h1>
        <ul>
            <li class="imgSuite"><img src="./image/Suites/Voyage au centre de la mer-3.jpg">Voyage au centre de la mer</li>
            <li class="imgSuite"><img src="./image/Suites/Entre ciel et eau.webp">Entre ciel et eau</li>
            <li class="imgSuite"><img src="./image/Suites/Sérénité Littorale.jpg">Sérénité Littorale</li>
            <li class="imgSuite"><img src="./image/Suites/Refuge Marin.jpg">Refuge Marin</li>
            <li class="imgSuite"><img src="./image/Suites/Suite Horizon.jpg">Suite Horizon</li>
            <li class="imgSuite"><img src="./image/Suites/Suite Maritime.webp">Suite Maritime</li>
            <li class="imgSuite"><img src="./image/Suites/Suite Océane.jpg">Suite Océane</li>
        </ul>
        </section>
        <section class="Section3 mainPageSect"></section>
    </div>

    <script src="index.js" defer></script>
</body>
</html>