<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = !empty($_SESSION['id']);
if (!$isLoggedIn || $_SESSION['isAdmin'] != 1) {
    header('Location: ../');
    exit(1);
}

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');


// Ajouter une suite
if (isset($_POST['addSuite']) && $_POST['addSuite'] == 'addSuite') {
    $_POST['addSuite'] = null;
    $query = $db->prepare('INSERT INTO suite (`nom`,`description`,`place`,`surface`, `price`) VALUES (?, ?, ?, ?, ?);');
    $query->execute([
        $_POST['name'],
        $_POST['desc'],
        $_POST['pers'],
        $_POST['surface'],
        $_POST['price'],

    ]);
    echo "added";
    unset($_POST);
}

if (isset($_POST['addReservation']) && $_POST['addReservation'] == 'addReservation') {
    $_POST['addSuite'] = null;
    $query = $db->prepare('INSERT INTO reserve (`id`, `id_1`, `jour`) VALUES (?, ?, ?);');
    $query->execute([
        $_POST['suiteSelect'],
        $_POST['userSelect'],
        $_POST['reservationDate']
    ]);
    echo "added";
    unset($_POST);
}

if (!empty($_POST['addImg']) && !empty($_POST['imageLink'])) {
    $query = $db->prepare('SELECT * FROM `image` WHERE `url` = ?;');
    $query->execute([
        $_POST['imageLink']
    ]);

    $imgs = $query->fetchAll();

    if (empty($imgs)) {
        try {
            $query = $db->prepare('INSERT INTO `image` VALUES (?);');
            $query->execute([
                $_POST['imageLink']
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    $query = $db->prepare('INSERT INTO `illustre` VALUES (?, ?);');
    $query->execute([
        $_POST['addImg'],
        $_POST['imageLink']
    ]);


    $_POST['addImg'] = null;
    echo "added";
    unset($_POST);
}

if (isset($_POST['updateSuite'])) {
    $query = $db->prepare('UPDATE suite SET `nom` = ?,`description` = ?,`place` = ?,`surface` = ?, `price` = ? WHERE id = ?;');
    $query->execute([
        $_POST['name'],
        $_POST['desc'],
        $_POST['pers'],
        $_POST['surface'],
        $_POST['price'],
        $_POST['updateSuite']
    ]);
    echo "updated";
}

if (isset($_POST['deleteSuite']) && $_POST['deleteSuite'] != null) {
    $query = $db->prepare('DELETE FROM suite WHERE id = ?;');
    $query->execute([
        $_POST['deleteSuite']
    ]);
    echo "deleted";
    $_POST['deleteSuite'] = null;
}



if (isset($_POST['updateUser'])) {
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

if (isset($_POST['validateReservation'])) {
    $query = $db->prepare('UPDATE `reserve` SET `valide`= 1 WHERE jour = ? AND `id`= ? ');
    $query->execute(
        explode(";", $_POST['validateReservation'])
    );
    echo "updated";
}

if (isset($_POST['deleteUser']) && $_POST['deleteUser'] != null) {
    $query = $db->prepare('DELETE FROM utilisateur WHERE id = ?;');
    $query->execute([
        $_POST['deleteUser']
    ]);
    echo "deleted";
    $_POST['deleteUser'] = null;
}

if (isset($_POST['deleteImage']) && $_POST['deleteImage'] != null) {
    $id = explode(',', $_POST['deleteImage'])[0];
    $url = explode(',', $_POST['deleteImage'])[1];
    $query = $db->prepare('DELETE FROM illustre WHERE `id` = ? AND `url` = ?;');
    $query->execute([
        $id,
        $url
    ]);
    echo "deleted";
    $_POST['deleteUser'] = null;
}

if (isset($_POST['deleteReservation'])) {
    $query = $db->prepare('DELETE FROM `reserve` WHERE jour = ? AND `id`= ? ');
    $query->execute(
        explode(";", $_POST['deleteReservation'])
    );
    echo "updated";
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

        <!-- SUITES -->
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
                    $sql .= " WHERE nom LIKE '%" . $_GET['chambre'] . "%'";
                }

                $query = $db->prepare($sql);
                $query->execute();
                $suites = $query->fetchAll();
                foreach ($suites as $suite => $value) {
                ?>
                    <form class="suiteCard" method="post">
                        <h3><input type="text" name="name" id="name" value="<?php echo ($value['nom']); ?>"></h3>
                        <label for="surface">surface (m²)</label>
                        <input type="number" name="surface" id="surface" step="1" value="<?php echo ($value['surface']); ?>">
                        <label for="pers">pers :</label>
                        <input type="number" name="pers" id="pers" step="1" value="<?php echo ($value['place']); ?>">
                        <label for="price">prix :</label>
                        <input type="number" name="price" id="price" step="1" value="<?php echo ($value['price']); ?>">


                        <Label>images</Label>
                        <ul class="imageGallery">
                            <?php
                            $sql = 'SELECT * FROM illustre WHERE id = ?';

                            $query = $db->prepare($sql);
                            $query->execute([
                                $value['id']
                            ]);
                            $images = $query->fetchAll();
                            foreach ($images as $image => $data) {
                            ?>
                                <li>
                                    <img src="<?php echo ($data['url']); ?>" alt="">
                                    <button type="submit" class="deletebtn" value="<?php echo ($data['id'] . ',' . $data['url']); ?>" id="deleteImage" name="deleteImage">X</button>
                                </li>
                            <?php } ?>


                        </ul>

                        <input type="text" src="" name="imageLink" id="imageLink" placeholder="url">
                        <button type="submit" value="<?php echo ($value['id']); ?>" name="addImg" id="addImg">ajouter</button>

                        <label for="desc">description :</label>
                        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="no description"><?php echo ($value['description']); ?></textarea>
                        <button type="submit" class="validatebtn" value="<?php echo ($value['id']); ?>" id="updateSuite" name="updateSuite">Enregistrer</button>
                        <button type="submit" class="deletebtn" value="<?php echo ($value['id']); ?>" id="deleteSuite" name="deleteSuite">Supprimer</button>
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
                    <label for="price">prix :</label>
                    <input type="number" name="price" id="price" step="1" placeholder="150">
                    <label for="desc">description :</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="nice view"></textarea>
                    <button type="submit" class="validatebtn" name="addSuite" id="addSuite" value="addSuite">Ajouter</button>
                </form>
            </div>
        </section>

        <!-- RESERVATIONS -->
        <section>
            <h2>Réservations</h2>
            <div class="SuitesCards">
                <?php
                $sql = 'SELECT * FROM reserve';
                if (!empty($_GET['chambre'])) {
                    $sql .= " WHERE jour LIKE '%" . $_GET['reserv'] . "%'";
                }
                $sql .= " ORDER BY jour ASC";

                $query = $db->prepare($sql);
                $query->execute();
                $reservations = $query->fetchAll();

                foreach ($reservations as $reservation => $value) {
                    // get the clients names
                    $sql = 'SELECT id, nom, prenom FROM utilisateur WHERE id = ?';

                    $query = $db->prepare($sql);
                    $query->execute([$value['id_1']]);
                    $utilisateur = $query->fetch();

                    // get the suite, by the way
                    $sql = 'SELECT id, nom FROM suite';

                    $query = $db->prepare($sql);
                    $query->execute();
                    $suite = $query->fetch();

                    $date = new DateTime($value['jour']);
                ?>
                    <form class="suiteCard " method="post">
                        <h3><?php echo ($utilisateur['nom'] . " " . $utilisateur['prenom']); ?></h3>
                        <p><?php echo ($suite['nom']); ?></p>
                        <p><?php echo (date_format($date, "d F Y")); ?></p>
                        <?php
                        if (empty($value['valide']) || $value['valide'] == 0) {
                        ?>
                            <button type="submit" class="validatebtn" value="<?php echo ($value['jour'] . ";" . $value['id']); ?>" id="validateReservation" name="validateReservation">Valider</button>
                        <?php } else { ?>
                            <p>validé</p>
                        <?php } ?>

                        <button type="submit" class="deletebtn" value="<?php echo ($value['jour'] . ";" . $value['id']); ?>" id="deleteReservation" name="deleteReservation">Refuser</button>
                    </form>
                <?php } ?>
                <form class="suiteCard add" method="post">
                    <h3>
                        <select name="userSelect" id="userSelect">
                            <?php
                            // get the clients names
                            $sql = 'SELECT id, nom, prenom FROM utilisateur';

                            $query = $db->prepare($sql);
                            $query->execute();
                            $utilisateurs = $query->fetchAll();
                            foreach ($utilisateurs as $user => $userData) {
                                echo ('<option value="' . $userData['id'] . '">' . $userData['nom'] . " " . $userData['prenom'] . '</option>');
                            }
                            ?>
                        </select>
                    </h3>
                    <select name="suiteSelect" id="suiteSelect">
                        <?php
                        // get the clients names
                        $sql = 'SELECT id, nom FROM suite';

                        $query = $db->prepare($sql);
                        $query->execute();
                        $suites = $query->fetchAll();
                        foreach ($suites as $suite => $suiteData) {
                            echo ('<option value="' . $suiteData['id'] . '">' . $suiteData['nom'] . '</option>');
                        }
                        ?>
                    </select>
                    <input type="date" name="reservationDate" id="reservationDate">
                    <button type="submit" class="addbtn" value="addReservation" id="addReservation" name="addReservation">Ajouter</button>

                </form>
            </div>
        </section>

        <!-- CLIENTS -->
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
                    $sql .= " WHERE nom LIKE '%" . $_GET['user'] . "%' OR prenom LIKE '%" . $_GET['user'] . "%' OR email LIKE '%" . $_GET['user'] . "%' OR CP LIKE '%" . $_GET['user'] . "%'";
                }
                $query = $db->prepare($sql);
                $query->execute();
                $users = $query->fetchAll();
                foreach ($users as $user => $value) {
                ?>
                    <form class="suiteCard" method="post">
                        <h3>ID <?php echo ($value['id']) ?></h3>
                        <label for="name">nom</label>
                        <input type="text" name="nom" id="nom" value="<?php echo ($value['nom']); ?>" placeholder="nom">

                        <label for="name">prenom</label>
                        <input type="text" name="prenom" id="prenom" value="<?php echo ($value['prenom']); ?>" placeholder="prenom">

                        <label for="pers">email</label>
                        <input type="email" name="email" id="email" value="<?php echo ($value['email']); ?>" placeholder="email">

                        <label for="tel">téléphone</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo ($value['tel']); ?>" placeholder="téléphone">

                        <label for="adresse">adresse</label>
                        <input type="text" name="adresse" id="adresse" value="<?php echo ($value['adresse']); ?>" placeholder="addresse">

                        <label for="name">ville</label>
                        <input type="text" name="ville" id="ville" value="<?php echo ($value['ville']); ?>" placeholder="ville">

                        <label for="CP">CP</label>
                        <input type="number" min=10000 max=99999 name="CP" id="CP" value="<?php echo ($value['CP']); ?>" placeholder="CP">

                        <label for="isAdmin">est admin</label>
                        <input type="checkbox" name="isAdmin" id="isAdmin" value="0" <?php echo ($value['isAdmin'] == 1 ? 'checked' : ''); ?>>

                        <button type="submit" class="validatebtn" value="<?php echo ($value['id']); ?>" id="updateUser" name="updateUser">Enregistrer</button>
                        <button type="submit" class="deletebtn" value="<?php echo ($value['id']); ?>" id="deleteUser" name="deleteUser">Supprimer</button>
                    </form>
                <?php } ?>
            </div>
        </section>
    </section>
    <?php
    require_once('../footer.php');
    ?>
</body>

</html>