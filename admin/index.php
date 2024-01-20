<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = !empty($_SESSION['id']);
if (!$isLoggedIn || $_SESSION['isAdmin'] != 1) {
    header('Location: ../');
    exit(1);
}

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');


// Ajouter une suite
if(isset($_POST['addSuite']) && $_POST['addSuite'] == 'addSuite'){
    $_POST['addSuite'] = null;
    $query = $db->prepare('INSERT INTO suite (`nom`,`description`,`place`,`surface`) VALUES (?, ?, ?, ?);');
    $query->execute([
        $_POST['name'],
        $_POST['desc'],
        $_POST['pers'],
        $_POST['surface']
    ]);
    echo "added";
}

if(isset($_POST['updateSuite'])){
    $query = $db->prepare('UPDATE suite SET `nom` = ?,`description` = ?,`place` = ?,`surface` = ? WHERE id = ?;');
    $query->execute([
        $_POST['name'],
        $_POST['desc'],
        $_POST['pers'],
        $_POST['surface'],
        $_POST['updateSuite']
    ]);
    echo "updated";
}

if(isset($_POST['deleteSuite']) && $_POST['deleteSuite'] != null){
    $query = $db->prepare('DELETE FROM suite WHERE id = ?;');
    $query->execute([
        $_POST['deleteSuite']
    ]);
    echo "deleted";
    $_POST['deleteSuite'] = null;
}



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
                    <input type="search" name="chambre" id="chambre" placeholder="Rechercher chambre" value="<?php
                    if (!empty($_GET['chambre'])) {
                        echo ($_GET['chambre']);
                    }; ?>">
                </span>
            </form>
            <div class="SuitesCards">
                <?php
                    $sql = 'SELECT * FROM suite';
                    if (!empty($_GET['chambre'])) {
                        $sql .= " WHERE nom LIKE '%".$_GET['chambre']."%'";
                    }

                    $query = $db->prepare($sql);
                    $query->execute();
                    $suites = $query->fetchAll();
                    foreach ($suites as $suite => $value) { 
                ?> 
                <form class="suiteCard" method="post">
                    <h3><input type="text" name="name" id="name" value="<?php echo($value['nom']); ?>"></h3>
                    <label for="surface">surface (m²)</label>
                    <input type="number" name="surface" id="surface" step="1" value="<?php echo($value['surface']); ?>">
                    <label for="pers">pers :</label>
                    <input type="number" name="pers" id="pers" step="1" value="<?php echo($value['place']); ?>">
                    <label for="desc">description :</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="no description"><?php echo($value['description']); ?></textarea>
                    <button type="submit" class="validatebtn" value="<?php echo($value['id']); ?>" id="updateSuite" name="updateSuite">Enregistrer</button>
                    <button type="submit" class="deletebtn" value="<?php echo($value['id']); ?>" id="deleteSuite" name="deleteSuite">Supprimer</button>
                </form>
                <?php
                    }
                ?>
                <form class="suiteCard add" method="post">
                    <h3><input type="text" name="name" id="name" placeholder="Nouvelle Suite"></h3>
                    <label for="surface">surface (m²)</label>
                    <input type="number" name="surface" id="surface" step="1" placeholder="9">
                    <label for="pers">pers :</label>
                    <input type="number" name="pers" id="pers" step="1" placeholder="2">
                    <label for="desc">description :</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="nice view"></textarea>
                    <button type="submit" class="validatebtn" name="addSuite" id="addSuite">Ajouter</button>
                </form>
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
                    $query = $db->prepare('SELECT * FROM utilisateur;');
                    $query->execute();
                    $users = $query->fetchAll();
                    foreach ($users as $user => $value) { 
                ?> 
                <form class="suiteCard" method="post">
                    <h3>ID <?php echo($value['id']) ?></h3>
                    <label for="name">nom</label>
                    <input type="number" name="name" id="name" step="1" value="<?php echo($value['name']); ?>">
                    <label for="name">nom</label>
                    <input type="number" name="name" id="name" step="1" value="<?php echo($value['name']); ?>
                    <label for="pers">pers :</label>
                    <input type="number" name="pers" id="pers" step="1" value="<?php echo($value['place']); ?>">
                    <label for="desc">description :</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="no description"><?php echo($value['description']); ?></textarea>
                    <button type="submit" class="validatebtn" value="<?php echo($value['id']); ?>" id="updateSuite" name="updateSuite">Enregistrer</button>
                    <button type="submit" class="deletebtn" value="<?php echo($value['id']); ?>" id="deleteSuite" name="deleteSuite">Supprimer</button>
                </form>
                <form class="suiteCard" method="get">
                    <h3>ID <?php echo($value['id']) ?></h3>
                    <p><?php echo($value['nom']." ".$value['prenom']); ?></p>
                    <p><?php echo($value['email']); ?></p>
                    <p><?php echo($value['tel']); ?></p>
                    <p><?php 
                        if (!empty($value['adresse']) && !empty($value['ville']) && !empty($value['CP'])) {
                            echo($value['adresse'].", ".$value['ville'].", ".$value['CP']); 
                        }
                    ?></p>
                    <button type="button" class="managebtn" >Gérer</button>
                    <button type="submit" class="deletebtn" value="<?php echo($value['id']); ?>" id="deleteUser" name="deleteUser">Supprimer</button>
                </form>
                <?php } ?>
            </div>
        </section>
    </section>
</body>
</html>