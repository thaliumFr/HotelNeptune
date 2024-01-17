<!-- Barre de navigation -->
<nav class="navbar">
        <ul class="nav-list">
            <li>
                <a class="active nav-element title" href="index.php">
                    <p>Hotel Neptune</p>
                    <div class="stars">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                            <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                            <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                            <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"viewBox="0 0 36 33" class="star">
                            <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                            <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135"/>
                        </svg>
                    </div>
                </a>
            </li>
            <li><a class="nav-element UnderlineAnim" href="search.php">Chambres et Suites</a></li>
            <li><a class="nav-element UnderlineAnim" href="kitchen.php">Restauration</a></li>
            <li><a class="nav-element UnderlineAnim" href="noboring.php">Activités</a></li>
            <li><a class="nav-element UnderlineAnim" href="usefull.php">Services</a></li>
            <li><a class="nav-element UnderlineAnim" href="contact.php">Contact</a></li>
            <?php if ($isLoggedIn) { ?>
            <li><a class="nav-element button" href="login.php">Connexion</a></li>
            <?php } else { ?>
            <li><a class="nav-element" href="register.php"><img class="profilimage" src="./image/icons/pngegg.png" alt="Image de profil"></a></li>
            <?php } ?>
        </ul>
    </nav>