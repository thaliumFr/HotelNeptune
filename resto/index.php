<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>
    <section>
        <h1>Restaurants</h1>
        <p class="Description_resto">
            Bienvenue à l'hôtel Neptune où l'élégance rencontre la gastronomie d'exception. Niché au cœur d'un cadre idyllique,
            notre établissement vous invite à une expérience hôtelière inoubliable, où le luxe et la délectation culinaire se marient harmonieusement.
            Nos restaurants, véritables joyaux de la gastronomie, vous promettent un voyage sensoriel raffiné, mêlant saveurs exquises et ambiance chaleureuse.
        </p>
    </section>
    <section>
        <h2>Perles d'Écume - Cuisine Océanique</h2>
        <div class="grid">
            <img src="https://www.guides-restaurants.fr/wp-content/uploads/restaurant-le-cinq-550x400.jpg" alt="image Perles d'écume">
            <p>
                Bienvenue à "Perles d'Écume",
                une expérience gastronomique exceptionnelle nichée sur le littoral majestueux. Notre restaurant, imprégné de l'essence marine, vous offre bien plus qu'un repas –
                c'est un voyage culinaire où la fraîcheur des ingrédients rencontre l'ingéniosité créative de nos chefs.
                "Perles d'Écume" s'engage à vous faire découvrir une palette de saveurs raffinées,
                mettant en avant des plats exquis élaborés avec passion et savoir-faire.
                Inspirés par la richesse de la mer, nos chefs élaborent des créations gastronomiques qui capturent l'essence même des ingrédients locaux les plus fins.
                Installez-vous dans notre ambiance élégante, bercés par la brise marine, et laissez-vous transporter par une symphonie de saveurs.
                Des fruits de mer délicats aux plats innovants, chaque bouchée vous emmène en voyage, capturant l'essence du terroir et de l'océan.
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">L'Horizon Gourmand</h2>
        <div class="grid">
            <p>
                Bienvenue à "L'Horizon Gourmand", un charmant repaire en bord de mer où la simplicité rencontre la gourmandise dans une ambiance décontractée.
                Notre restaurant se veut une invitation chaleureuse à savourer des plats délicieux, concoctés avec soin et mettant en valeur la fraîcheur des trésors marins.
                "L'Horizon Gourmand" offre une expérience décontractée, parfaite pour ceux qui recherchent une cuisine savoureuse sans fioritures excessives. Installés dans notre atmosphère conviviale,
                profitez d'une vue imprenable sur l'océan tout en dégustant des plats préparés avec amour par notre équipe de chefs passionnés.
                Notre menu varié propose une palette de saveurs allant des fruits de mer fraîchement pêchés aux plats régionaux gourmands. Ici, la qualité des ingrédients prime, et chaque bouchée révèle la générosité de la mer et de la cuisine locale.
                Que vous soyez en quête d'un repas décontracté en famille ou d'un dîner romantique au coucher du soleil,
                "L'Horizon Gourmand" vous accueille pour une expérience authentique les pieds dans le sable.
            </p>
            <img src="https://www.yonder.fr/sites/default/files/styles/lg-insert/public/contenu/destinations/Belmond_la-samana-smx-restaurant.jpg?itok=iVwY74kC" alt="image du restaurant l'horizon gourmand">
        </div>
    </section>
    <section>
        <h2>Océan à Volonté</h2>
        <div class="grid">
            <img src="https://cdn.sortiraparis.com/images/80/104243/983932-le-brunch-du-refectoire-des-moines-a-l-abbaye-des-vaux-de-cernay-a7c7017.jpg" alt="image du buffet Océan à Volonté">
            <p>
                Bienvenue à "Océan à Volonté", un paradis culinaire en bord de mer où les vagues de saveurs vous emportent dans un festin ininterrompu.
                Notre buffet, baigné par la brise marine, vous offre une expérience gourmande inégalée, mettant en vedette une abondance de délices inspirés par les trésors de l'océan.
                Dans cet environnement décontracté et convivial, "Océan à Volonté" célèbre la diversité des saveurs marines, mettant à votre disposition un éventail alléchant de fruits de mer frais, de plats locaux savoureux et de créations culinaires uniques.
                À chaque coin du buffet, découvrez une symphonie de couleurs, de textures et de parfums, évoquant le riche patrimoine gastronomique de la côte.
                Que vous soyez amateur de fruits de mer délicats, de mets régionaux authentiques ou simplement curieux de goûter à tout, notre buffet vous invite à vous régaler à votre rythme, avec vue sur l'horizon infini.
                "Océan à Volonté" vous promet une expérience gastronomique inoubliable, où la générosité de la mer se marie à une abondance de plaisirs pour satisfaire tous les palais.
            </p>
        </div>
    </section>

    <?php
    require_once('../footer.php');
    ?>
</body>

</html>