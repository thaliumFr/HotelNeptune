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
        <section class="Section1" data-parallax="0.1">
            <div>
                <h1>Voyage Entre ciel et mer</h1>
                <p>
                    L'Hôtel Neptune, niché au cœur d'une île paradisiaque, incarne l'élégance et le luxe avec ses 5 étoiles scintillantes.
                    Immergé dans un environnement tropical idyllique, l'établissement offre une expérience unique alliant confort exceptionnel et service de première classe. 
                    Les visiteurs de l'Hôtel Neptune sont accueillis par des paysages à couper le souffle, des plages de sable fin et des eaux cristallines, créant une atmosphère de détente absolue.
                </p>
            </div>
        </section>
        <section>
            
        </section>
        <section></section>
    </div>

    <script src="index.js" defer></script>
</body>
</html>