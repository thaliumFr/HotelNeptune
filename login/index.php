<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = isset($_COOKIE['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

// Si le formulaire est soumis et complet
if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    // On récupère l'utilisateur correspondant au mail
    $query = $db->prepare('SELECT * FROM Utilisateur WHERE mail = :mail');
    $query->execute([
        'mail' => $_POST['mail']
    ]);
    $user = $query->fetch();

    // Si l'utilisateur existe
    if ($user) {
        // On vérifie que le mot de passe est correct
        if (password_verify($_POST['password'], $user['password'])) {
            // On connecte l'utilisateur
            $_SESSION['id'] = $user['id'];
            $_SESSION['mail'] = $user['mail'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['role'] = $user['role'];

            // On redirige vers la page d'accueil
            header('Location: index.php');
            exit;
        }
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
    require_once('../navbar.php');
    ?>
    
    <!-- Container = Site entier -->
    <div class="container">
        <header data-parallax>
            <form action="" method="post">
                <h1>Se connecter</h1>

                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail" placeholder="Adresse E-mail">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">

                <input type="submit" value="Se connecter">
            </form>
        </header>
    </div>

    <script src="../index.js" defer></script>
</body>
</html>