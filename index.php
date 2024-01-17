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
        <header data-parallax>
            <div class="presentation">
                <h1>Hotel Netpune</h1>
                <h2>A la rencontre entre le luxe et la mer</h2>
            </div>
            <div class="search">
                <ul>
                    <li class="searchbar">Recherchez votre chambre</li>
                    <li>Filtres</li>
                    <li>Rechercher</li>
                </ul>
            </div>
        </header>
        <section></section>
        <section></section>
        <section></section>
    </div>

    <script src="index.js" defer></script>
</body>
</html>