<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = isset($_COOKIE['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && $_POST['password'] == $_POST['password2']) {
    // Verifier si l'utilisateur existe déjà
    $query = $db->prepare('SELECT * FROM users WHERE email = ?');
    $query->execute([$_POST['mail']]);
    $user = $query->fetch();
    
    if ($user) {
        $message = "L'utilisateur existe déjà";
    } else {
        // Inscrire l'utilisateur
        $query = $db->prepare('INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)');
        $query->execute([$_POST['nom'], $_POST['prenom'], $_POST['mail'], password_hash($_POST['password'], PASSWORD_DEFAULT)]);
        $message = "Vous êtes inscrit";
    }
} else if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2']) && $_POST['password'] != $_POST['password2']) {
    $message = "Les mots de passe ne correspondent pas";
} else if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['mail']) || !isset($_POST['password']) || !isset($_POST['password2'])) {
    $message = "Veuillez remplir tous les champs";
}
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
    require('./navbar.php');
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

                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail" placeholder="Adresse E-mail">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">

                <label for="password2">Confirmer le mot de passe</label>
                <input type="password" name="password2" id="password2" placeholder="Confirmer le mot de passe">

                <input type="submit" value="S'inscrire">
            </form>
        </header>
    </div>

    <script src="index.js" defer></script>
</body>
</html>