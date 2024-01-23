<?php
session_start();

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
                <form class="searchSuite" action="/HotelNeptune/search" method="get">
                    <input class="searchbar" type="search" placeholder="Cherchez votre suite" name="chambre" id="chambre">
                    <button type="submit">Recherchez</button>
                </form>
            </div>
        </header>
        <section class="Section1 mainPageSect parallaxStatic">
            <div>
                <h2>Voyage Entre ciel et mer</h2>
                <p>
                    L'Hôtel Neptune, niché au cœur d'une île paradisiaque, incarne l'élégance et le luxe avec ses 5 étoiles scintillantes.
                    Immergé dans un environnement tropical idyllique, l'établissement offre une expérience unique alliant confort exceptionnel et service de première classe.
                    Les visiteurs de l'Hôtel Neptune sont accueillis par des paysages à couper le souffle, des plages de sable fin et des eaux cristallines, créant une atmosphère de détente absolue.
                </p>
            </div>
        </section>
        <section class="Section2 mainPageSect parallaxStatic">
            <h2>Votre voyage commence ici</h2>
            <ul>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Voyage au centre de la mer-3.jpg">
                        <span>Voyage au centre de la mer</span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Entre ciel et eau.webp">
                        <span>Entre ciel et eau<span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Sérénité Littorale.jpg">
                        <span>Sérénité Littorale<span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Refuge Marin.jpg">
                        <span>Refuge Marin<span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Suite Horizon.jpg">
                        <span>Suite Horizon<span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Suite Maritime.webp">
                        <span>Suite Maritime<span>
                    </a>
                </li>
                <li class="imgSuite">
                    <a href="#">
                        <img src="./image/Suites/Suite Océane.jpg">
                        <span>Suite Océane<span>
                    </a>
                </li>
            </ul>
        </section>
        <section class="Section3 mainPageSect"></section>
    </div>

    <?php
    require_once('./footer.php');
    ?>

    <script src="index.js" defer></script>
</body>

</html>