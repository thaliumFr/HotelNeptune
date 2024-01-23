<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activités</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php
    require_once('../navbar.php');
    ?>

    <span class="navSpacing"></span>
    <section>
        <h1>Activités</h1>
        <p class="Description_resto">
            Bienvenue à l'Hôtel Neptune, votre refuge en bord de mer où l'élégance rencontre les embruns marin.
            Notre établissement, niché au cœur d'un paysage marin envoûtant, vous invite à une escapade exceptionnelle,
            mêlant confort raffiné et une multitude d'activités soigneusement élaborées pour enrichir votre séjour.
            À l'Hôtel Neptune, chaque moment est une occasion de plonger dans l'aventure.
        </p>
    </section>
    <section>
        <h2>Plongée</h2>
        <div class="grid">
            <img src="https://media.istockphoto.com/id/498283106/fr/photo/sous-marine-de-plongeur-explorer-et-profiter-de-la-vie-aquatique-de-coral-reef.jpg?s=612x612&w=0&k=20&c=wmoEpVIsNOCPIiNVBS3vB71mJJczvOqm-OYHG5uRFR0=" alt="image de plongé">
            <p>
                Plongez dans une aventure immersive avec l'Hôtel Neptune et découvrez l'émerveillement des profondeurs marines.
                Notre excursion de plongée exceptionnelle offre une exploration unique des fonds sous-marins, révélant un monde aquatique riche en couleurs et en biodiversité.
                Accompagnés par nos instructeurs certifiés, les plongeurs novices et expérimentés peuvent admirer la beauté des récifs coralliens, explorer des grottes sous-marines mystérieuses et nager parmi une variété fascinante de créatures marines.
                Une expérience inoubliable qui conjugue l'aventure de la plongée avec le confort luxueux de l'Hôtel Neptune,
                vous invitant à créer des souvenirs inoubliables dans les eaux cristallines qui bordent notre paradis en bord de mer.
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">Spa</h2>
        <div class="grid">
            <p>
                Plongez dans l'ultime détente à notre spa en bord de mer à l'Hôtel Neptune.
                Profitez d'un refuge paisible où les vagues murmurent des mélodies apaisantes.
                Nos soins exclusifs, associés à une vue panoramique sur l'océan, offrent une expérience régénérante.
                Laissez-vous choyer par des massages revitalisants et des traitements bien-être, enveloppé dans une atmosphère sereine qui éveille tous vos sens.
                Au spa de l'Hôtel Neptune, chaque moment est une invitation à l'évasion et à la revitalisation, créant un équilibre parfait entre le bien-être et la beauté de l'environnement côtier.
            </p>
            <img src="https://www.chateauvalmer.com/pages/accueil/009.jpg" alt="image de spa">
        </div>
    </section>
    <section>
        <h2>Excursions</h2>
        <div class="grid">
            <img src="https://static.nationalgeographic.fr/files/styles/image_3200/public/bd7552fb8ee20a6412fe051401f40bfe.jpg?w=1600&h=900" alt="image de plage privé">
            <p>
                Explorez les trésors côtiers avec les excitantes excursions proposées par l'Hôtel Neptune.
                Nos expériences uniques vous emmènent à la découverte des joyaux environnants, qu'il s'agisse d'excursions en bateau pour contempler des paysages côtiers époustouflants,
                de visites guidées pour explorer la culture locale, ou d'aventures en pleine nature pour admirer la faune et la flore exceptionnelles. Accompagnées par des guides experts,
                nos excursions offrent des moments mémorables dans un cadre enchanteur, créant des souvenirs inoubliables au fil de votre séjour à l'Hôtel Neptune.
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">Visite guidée</h2>
        <div class="grid">
            <p>
                Laissez-vous guider à travers des découvertes captivantes avec les visites guidées exclusives de l'Hôtel Neptune.
                Une expérience incontournable est notre visite privilégiée d'une rhumerie locale, où nos guides passionnés vous plongeront dans l'art fascinant de la fabrication du rhum.
                Vous explorerez les secrets de la distillation, découvrirez l'histoire de cette tradition insulaire, et dégusterez des rhums sélectionnés avec soin. Cette visite immersive ne représente qu'une des nombreuses opportunités de découvrir la richesse culturelle de la région grâce aux visites guidées de l'Hôtel Neptune.
                Chaque expérience est conçue pour vous offrir un aperçu authentique de la destination, ajoutant une touche mémorable à votre séjour côtier.
            </p>
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/06/5a/55/16/rhumerie-de-chamarel.jpg?w=1200&h=-1&s=1" alt="image de rhumerie">
        </div>
    </section>
    <section>
        <h2>Activités nautiques</h2>
        <div class="grid">
            <img src="https://lepetitplongeur.fr/wp-content/uploads/2020/10/activite-aquatique-liste.jpg" alt="image de surfeur">
            <p>
                À l'Hôtel Neptune, notre éventail d'activités nautiques offre une palette d'expériences inoubliables au bord de la mer.
                Parmi les nombreuses options disponibles, vous pourrez profiter de:<br>- Planche à voile <br>- Kayak <br>- Excursions en bateau <br>- Paddle <br>- Ski nautique <br>- et bien d'autres encore...
            </p>
        </div>
    </section>
    <section>
        <h2 class="AlignRight">Randonnée</h2>
        <div class="grid">
            <p>
                Empruntez des sentiers pittoresques lors d'une randonnée autour de l'Hôtel Neptune. Découvrez la nature luxuriante qui borde notre établissement en bord de mer, offrant des vues panoramiques et des moments de tranquillité.
                Une escapade revitalisante où chaque pas vous rapproche de la beauté naturelle des environs, créant des souvenirs apaisants au cœur d'un cadre idyllique.
            </p>
            <img src="https://media.ucpa.com/image/upload/f_auto/t_UCPA/UCPA-SPORT-NATURE/International/00077061.jpg" alt="image de randonneuse">
        </div>
    </section>
    <?php
    require_once('../footer.php');
    ?>
</body>

</html>