<?php
session_start(); // pas touche sinon au coin !!!!

$_COOKIE['id'] = 1;
$isLoggedIn = !empty($_COOKIE['id']);
if (!$isLoggedIn) {
    header('Location: ../');
    exit(1);
}

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin manager</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php
        require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>
    <section>
        <h1>Panel d'administration</h1>
        <section>
            <h2>Chambres</h2>
            <form action="" method="get">
                <span class="search">
                    <input type="search" name="chambre" id="chambre" placeholder="Rechercher chambre">
                </span>
            </form>
            <div class="SuitesCards">
                <?php
                    for ($i=0; $i < 4; $i++) { 
                ?>
                <div class="suiteCard">
                    <h3>chambre n°45685</h3>
                    <p>25m²</p>
                    <p>2 pers</p>
                    <button type="button" class="managebtn" >Manage</button>
                </div>
                <?php
                    }
                ?>
                <button type="button" class="addbtn">Ajouter</button>
            </div>
        </section>
        <section>
            <h2>Réservations</h2>
            <form action="" method="get">
                <span class="search">
                    <input type="search" name="reserv" id="reserv" placeholder="Rechercher réservation">
                </span>
            </form>
            <div class="SuitesCards">
                <?php
                    for ($i=0; $i < 5; $i++) { 
                ?>
                <div class="suiteCard">
                    <h3>ID 054</h3>
                    <p>Chambre 04</p>
                    <p>2 pers</p>
                    <button type="button" class="managebtn" >Manage</button>
                    <button type="button" class="deletebtn" >Delete</button>
                </div>
                <?php
                    }
                ?>
                <button type="button" class="addbtn">Ajouter</button>
            </div>
        </section>
        <section>
            <h2>Clients</h2>
            <form action="" method="get">
                <span class="search">
                    <input type="search" name="user" id="user" placeholder="Rechercher client">
                </span>
            </form>
            <div class="SuitesCards">
                <?php
                    for ($i=0; $i < 5; $i++) { 
                ?> 
                <div class="suiteCard">
                    <h3>ID 054</h3>
                    <p>Chambre 01</p>
                    <p>Jean-Sébastien Dubois</p>
                    <button type="button" class="managebtn" >Manage</button>
                    <button type="button" class="deletebtn" >Delete</button>
                </div>
                <?php
                    }
                ?>
                <button type="button" class="addbtn">Ajouter</button>
            </div>
        </section>
    </section>
</body>
</html>