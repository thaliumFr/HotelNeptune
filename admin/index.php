<?php
session_start(); // pas touche sinon au coin !!!!


$_COOKIE['id'] = null;
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
</head>
<body>
    
</body>
</html>