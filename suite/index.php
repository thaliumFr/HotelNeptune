<?php
session_start(); // pas touche sinon au coin !!!!

$isLoggedIn = !empty($_SESSION['id']);

$db = new PDO('mysql:host=localhost;dbname=hotelneptune;charset=utf8', 'pierre.durand', 's3cr3t');

$sql = 'SELECT * FROM suite WHERE id = ?';

$query = $db->prepare($sql);
$query->execute([$_GET['id']]);
$value = $query->fetch();

if (!empty($_POST['reserve']) && !empty($_POST['end']) && !empty($_POST['start'])) {
    if (!$isLoggedIn) {
        $_POST['err'] = "vous n'etes pas connecté a un compte !";
    }

    $begin = new DateTime($_POST['start']);
    $end = new DateTime($_POST['end']);

    //Check if already reserved
    $sql = 'SELECT * FROM reserve WHERE id = ? AND jour BETWEEN ? AND ?';

    $query = $db->prepare($sql);
    $query->execute([$_GET['id'], date_format($begin, "Y-m-d H:i:s"), date_format($end, "Y-m-d H:i:s")]);
    $isAlreadyReserved = $query->fetchALL();

    if (empty($isAlreadyReserved)) {
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        $sql = "INSERT INTO reserve VALUES (?, ?, ?)";

        foreach ($period as $dt) {
            $query = $db->prepare($sql);
            $query->execute([
                $_GET['id'],
                $_SESSION['id'],
                date_format($dt, "Y-m-d H:i:s")
            ]);
            $data = $query->fetch();
            echo $dt->format("l Y-m-d H:i:s\n");
        }
    } else {
        $_POST['err'] = "Déjà une reservation sur ce créneau";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($value['nom']); ?> - Hotel Neptune</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>

    <h1><?php echo ($value['nom']); ?></h3>
        <section class="grid">
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
                <p><?php echo ($value['description']); ?></p>
                <button onclick="ToggleId('popup');">reserver</button>
            </div>
        </section>

        <form class="popup" id="popup" method="post" <?php if (!empty($_POST['err'])) echo 'style="display: block;"' ?>>
            <button type="button" onclick="ToggleId('popup');" class="deletebtn"><- retour</button>
                    <h3>Reserver</h3>
                    <label for="start">Début</label>
                    <input type="date" name="start" id="start">
                    <label for="end">Fin</label>
                    <input type="date" name="end" id="end">
                    <p class="err"><?php if (!empty($_POST['err'])) echo $_POST['err']; ?></p>
                    <button type="submit" name="reserve" id="reserve" value="reserve" class="validatebtn">Reserver !</button>
        </form>

        <?php
        require_once('../footer.php');
        ?>

        <script src=" ../index.js" defer></script>
        <script src="./suite.js" defer></script>
</body>

</html>