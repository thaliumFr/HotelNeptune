<?php
session_start(); // pas touche ou sinon au coin !


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Hotel Neptune</title>
</head>
<body>
    <!-- Barre de navigation -->
    <nav class="navbar">
        <ul>
            <li><a class="active nav-element" href="index.php">Hotel Neptune</a></li>
            <li><a class="nav-element" href="search.php">Chambres et Suites</a></li>
            <li><a class="nav-element" href="kitchen.php">Restauration</a></li>
            <li><a class="nav-element" href="noboring.php">Activités</a></li>
            <li><a class="nav-element" href="usefull.php">Services</a></li>
            <li><a class="nav-element" href="contact.php">Contact</a></li>
            <li><a class="nav-element button" href="login.php">Connexion</a></li>
            <li><a class="nav-element" href="register.php"><img class="profilimage" src="./image/user.png" alt="Image de profil"></a></li>
        </ul>
    </nav>
    
    <!-- Container = Site entier -->
    <div class="container">
        <section></section>
        <section></section>
        <section>
        </section>
    </div>
</body>
</html>