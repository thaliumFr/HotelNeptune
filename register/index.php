<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = empty($_COOKIE['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

$message = 'ok';
if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])) {
    $message = "Veuillez remplir tous les champs";
}

if ($message == 'ok' && $_POST['password'] != $_POST['password2']) {
    $message = "Les mots de passe ne correspondent pas";
}

if ($message === 'ok') {
    // Verifier si l'utilisateur existe déjà
    $query = $db->prepare('SELECT email FROM Utilisateur WHERE email = ?');
    $query->execute([$_POST['mail']]);
    $user = $query->fetch();

    if ($user) {
        $message = "L'utilisateur existe déjà";
    } else {
        // Inscrire l'utilisateur
        $query = $db->prepare('INSERT INTO Utilisateur (nom, prenom, email, passwd) VALUES (?, ?, ?, ?)');
        $query->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);
        $message = "Vous êtes inscrit";

        $query = $db->prepare('SELECT * FROM utilisateur WHERE email = :email;');
        $query->execute([
            'email' => $_POST['email']
        ]);
        $user = $query->fetch();

        // On connecte l'utilisateur
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['isAdmin'] = 0;

        // On redirige vers la page d'accueil
        header('Location: ../index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Hotel Neptune</title>
</head>

<body>
    <?php
    require('../navbar.php');
    ?>

    <!-- Container = Site entier -->
    <div class="container">
        <header data-parallax>
            <form action="" method="post">
                <h1>Nous rejoindre</h1>

                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Adresse E-mail">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">

                <label for="password2">Confirmer le mot de passe</label>
                <input type="password" name="password2" id="password2" placeholder="Confirmer le mot de passe">

                <?php if ($message !== 'ok') { ?>
                    <label class="err"><?php echo $message; ?></label>
                <?php } ?>

                <input type="submit" value="S'inscrire">
            </form>
        </header>
        <p>Déjà client ? <a href="../login/">Se connecter !</a></p>
    </div>

    <?php
    require_once('../footer.php');
    ?>
    <script src="../index.js" defer></script>
</body>

</html>