<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = !empty($_SESSION['id']);
if (!$isLoggedIn) {
    header('Location: ../');
    exit(1);
}

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');


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

if (isset($_POST['deleteUser']) && $_POST['deleteUser'] != null) {
    $query = $db->prepare('DELETE FROM utilisateur WHERE id = ?;');
    $query->execute([
        $_POST['deleteUser']
    ]);
    echo "deleted";
    $_POST['deleteUser'] = null;
}


if (isset($_POST['DisconnectUser']) && $_POST['DisconnectUser'] != null) {
    session_destroy();
    header('Location: ../');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Neptune</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>
    <section>
        <h1>Profil client</h1>
        <?php
        $sql = 'SELECT * FROM utilisateur WHERE id = ?';
        $query = $db->prepare($sql);
        $query->execute([
            $_SESSION['id']
        ]);
        $value = $query->fetch();

        ?>
        <form class="suiteCard" method="post">
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
            <button type="submit" class="deletebtn" value="DisconnectUser" id="DisconnectUser" name="DisconnectUser">Se déconnecter</button>
            <button type="submit" class="deletebtn" value="<?php echo ($value['id']); ?>" id="deleteUser" name="deleteUser">Supprimer</button>
        </form>
        <?php
        require_once('../footer.php');
        ?>
    </section>
</body>

</html>