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



if(isset($_POST['updateUser'])){
    $query = $db->prepare('UPDATE `utilisateur` SET `nom`=?,`email`= ? ,`prenom`= ? ,`tel`= ? ,`adresse`= ? ,`ville`= ? ,`CP`= ?, isAdmin = ?  WHERE `id`= ? ');
    $query->execute([
        $_POST['nom'],
        $_POST['email'],
        $_POST['prenom'],
        $_POST['tel'],
        $_POST['adresse'],
        $_POST['ville'],
        $_POST['CP'],
        isset($_POST['isAdmin']) == 0 ? 0 : 1,
        $_POST['updateUser']
    ]);
    echo "updated";
}

if(isset($_POST['deleteUser']) && $_POST['deleteUser'] != null){
    $query = $db->prepare('DELETE FROM utilisateur WHERE id = ?;');
    $query->execute([
        $_POST['deleteUser']
    ]);
    echo "deleted";
    $_POST['deleteUser'] = null;
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
                    <input type="search" name="user" id="user" placeholder="Rechercher client" value="<?php if (!empty($_GET['user'])) {
                        echo ($_GET['user']);
                    }; ?>">
                </span>
            </form>
            <div class="SuitesCards">
                <?php
                    $sql = 'SELECT * FROM utilisateur';
                    if (!empty($_GET['user'])) {
                        $sql .= " WHERE nom LIKE '%".$_GET['user']."%' OR prenom LIKE '%".$_GET['user']."%' OR email LIKE '%".$_GET['user']."%' OR CP LIKE '%".$_GET['user']."%'";
                    }
                    $query = $db->prepare($sql);
                    $query->execute();
                    $users = $query->fetchAll();
                    foreach ($users as $user => $value) { 
                ?> 
                <form class="suiteCard" method="post">
                    <h3>ID <?php echo($value['id']) ?></h3>
                    <label for="name">nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo($value['nom']); ?>" placeholder="nom">

                    <label for="name">prenom</label>
                    <input type="text" name="prenom" id="prenom" value="<?php echo($value['prenom']); ?>" placeholder="prenom">

                    <label for="pers">email</label>
                    <input type="email" name="email" id="email" value="<?php echo($value['email']); ?>" placeholder="email">

                    <label for="tel">téléphone</label>
                    <input type="tel" name="tel" id="tel" value="<?php echo($value['tel']); ?>" placeholder="téléphone">

                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" id="adresse" value="<?php echo($value['adresse']); ?>" placeholder="addresse">

                    <label for="name">ville</label>
                    <input type="text" name="ville" id="ville" value="<?php echo($value['ville']); ?>" placeholder="ville">

                    <label for="CP">CP</label>
                    <input type="number" min=10000 max=99999 name="CP" id="CP" value="<?php echo($value['CP']); ?>" placeholder="CP">

                    <label for="isAdmin">est admin</label>
                    <input type="checkbox" name="isAdmin" id="isAdmin" value="0" <?php echo ($value['isAdmin']==1 ? 'checked' : '');?>>

                    <button type="submit" class="validatebtn" value="<?php echo($value['id']); ?>" id="updateUser" name="updateUser">Enregistrer</button>
                    <button type="submit" class="deletebtn" value="<?php echo($value['id']); ?>" id="deleteUser" name="deleteUser">Supprimer</button>
                </form>
                <?php } ?>
            </div>
        </section>
    </section>
</body>
</html>