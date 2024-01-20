<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = isset($_COOKIE['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

$message = 'ok';

// Si le formulaire est soumis et complet
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    // On récupère l'utilisateur correspondant au mail
    $query = $db->prepare('SELECT * FROM utilisateur WHERE email = :email;');
    $query->execute([
        'email' => $_POST['email']
    ]);
    $user = $query->fetch();

    // Si l'utilisateur existe
    if (!empty($user)) {
        // On vérifie que le mot de passe est correct
        if (password_verify($_POST['password'], $user['passwd'])) {
            // On connecte l'utilisateur
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['isAdmin'] = $user['isAdmin'];

            // On redirige vers la page d'accueil
            header('Location: ../index.php');
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

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Adresse E-mail">

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
                
                <?php if($message !== 'ok'){ ?>
                <label class="err"><?php echo $message; ?></label>
                <?php } ?>

                <input type="submit" value="Se connecter">
            </form>
        </header>
        <p>Pas encore de compte? <a href="../register/">Nous rejoindre!</a></p>
    </div>

    <script src="../index.js" defer></script>
</body>
</html>