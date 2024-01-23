<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>
    <section>
        <h1>Services</h1>
        <p class="Description_resto">
            L'Hôtel Neptune offre une gamme complète de services conçus pour rendre votre séjour inoubliable.
        </p>
    </section>
    <section>
        <h2>Bar 24h/24</h2>
        <div class="grid">
            <img src="/HotelNeptune/image/Services/bar-coconut.jpg" alt="image du bar">
            <p>
                Le Bar 24/24 de l'Hôtel Neptune est un refuge élégant et décontracté, ouvert en continu pour satisfaire vos envies à toute heure du jour et de la nuit.
                Niché au bord de l'océan, ce lieu offre une vue imprenable, créant une atmosphère idéale pour des moments de détente ou des rencontres conviviales.
                Notre équipe experte propose une sélection de boissons exquises, des cafés fins aux cocktails raffinés, dans un cadre où le calme de la journée se transforme en une ambiance animée en soirée.
                Un endroit où chaque instant est une invitation à la délectation et à la socialisation, offrant une expérience nocturne mémorable.
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">Massages</h2>
        <div class="grid">
            <p>
                Le service de massage à l'Hôtel Neptune offre une expérience relaxante et apaisante.
                Nos praticiens qualifiés vous guident à travers des massages personnalisés, utilisant des techniques expertes pour soulager les tensions et favoriser la détente.
                Dans un cadre serein, les soins bien-être offrent une escapade revitalisante, laissant chaque invité choyé et ressourcé.
            </p>
            <img src="https://seayouson.com/wp-content/uploads/2023/01/verandaspa-e1673504975840.jpg" alt="image d'un espace massage">
        </div>
    </section>
    <section>
        <h2>Salle de musculation</h2>
        <div class="grid">
            <img src="https://clubmetropolitan.fr/wp-content/uploads/2023/03/04.jpg" alt="">
            <p>
                La salle de musculation à l'Hôtel Neptune est un espace moderne et bien équipé, offrant tout le nécessaire pour une séance d'entraînement complète.
                Avec des équipements de qualité, des poids libres et des machines cardio, l'ambiance énergique de la salle de musculation crée un environnement propice à la remise en forme.
                Profitez d'une séance d'exercice dans un cadre fonctionnel et inspirant, adapté à tous les niveaux de condition physique.
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">Réception et Bagagerie</h2>
        <div class="grid">
            <p>
                La réception et le service de bagagerie de l'Hôtel Neptune sont disponibles 24h/24 pour répondre à vos besoins à tout moment de la journée.
                Notre équipe dédiée à la réception vous accueille chaleureusement à votre arrivée, facilitant un processus d'enregistrement efficace et assurant une assistance personnalisée pour rendre votre séjour agréable.
            </p>
            <img src="https://butler-academy.com/wp-content/uploads/2022/03/6-1080x675.jpg" alt="image de la récéption">
        </div>
    </section>

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>