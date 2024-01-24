<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = !empty($_SESSION['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

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
        <h1>Recherche</h1>
        <form action="" method="get" class="tags">
            <span class="search">
                <input type="search" name="chambre" id="chambre" placeholder="Rechercher chambre" value="<?php
                                                                                                            if (!empty($_GET['chambre'])) {
                                                                                                                echo ($_GET['chambre']);
                                                                                                            }; ?>">

            </span>
            <!-- <input type="number" min="0" name="price" id="price" placeholder="prix max"> -->
            <input type="number" min="0" name="pers" id="pers" placeholder="personnes" value="<?php
                                                                                                if (!empty($_GET['pers'])) {
                                                                                                    echo ($_GET['pers']);
                                                                                                }; ?>">
            <input type="number" min="0" name="surface" id="surface" placeholder="surface (m²)" value="<?php
                                                                                                        if (!empty($_GET['surface'])) {
                                                                                                            echo ($_GET['surface']);
                                                                                                        }; ?>">

            <input type="number" min="0" name="price" id="price" placeholder="prix (€)" value="<?php
                                                                                                if (!empty($_GET['price'])) {
                                                                                                    echo ($_GET['price']);
                                                                                                }; ?>">
            <input type="submit" value="search">
        </form>
        <div class="tags">
            <?php if (!empty($_GET['surface'])) { ?>
                <div class="tag">
                    <?php echo $_GET['surface'] ?> m²
                </div>
            <?php }
            if (!empty($_GET['pers'])) { ?>
                <div class="tag">
                    <?php echo $_GET['pers'] ?> personnes
                </div>
            <?php
            }
            if (!empty($_GET['price'])) { ?>
                <div class="tag">
                    < <?php echo $_GET['price'] ?> € </div>
                    <?php } ?>
                </div>


                <?php
                $sql = 'SELECT * FROM suite WHERE 1';
                if (!empty($_GET['chambre'])) {
                    $sql .= " AND nom LIKE '%" . $_GET['chambre'] . "%'";
                }
                if (!empty($_GET['surface'])) {
                    $sql .= " AND surface >=" . $_GET['surface'];
                }
                if (!empty($_GET['pers'])) {
                    $sql .= " AND place >=" . $_GET['pers'];
                }
                if (!empty($_GET['price'])) {
                    $sql .= " AND price <=" . $_GET['price'];
                }


                $query = $db->prepare($sql);
                $query->execute();
                $suites = $query->fetchAll();
                foreach ($suites as $suite => $value) {
                ?>
                    <div class="SearchCard">
                        <h3><?php echo ($value['nom']); ?></h3>
                        <div class="details">
                            <ul class="imageGallery">
                                <?php
                                $sql = 'SELECT * FROM illustre WHERE id = ?';

                                $query = $db->prepare($sql);
                                $query->execute([
                                    $value['id']
                                ]);
                                $data = $query->fetch();
                                if ($data) {
                                ?>
                                    <li>
                                        <img src="<?php echo ($data['url']); ?>" alt="<?php echo ($data['id']); ?>">
                                    </li>
                                <?php } ?>
                            </ul>
                            <div class="text">
                                <p>
                                    <?php echo ($value['surface']); ?> m²
                                </p>
                                <p>
                                    <?php echo ($value['place']); ?> personnes
                                </p>
                                <p>
                                    <?php echo ($value['price']); ?> €
                                </p>
                                <a href="/HotelNeptune/suite?id=<?php echo ($value['id']); ?>" class="button">Découvrir</a>
                            </div>

                        </div>

                    </div>
                <?php
                }
                ?>
    </section>

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>