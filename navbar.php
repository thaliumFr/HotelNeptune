<!-- Barre de navigation -->
<nav class="navbar">
    <ul class="nav-list">
        <li>
            <a class="active nav-element title" href="/HotelNeptune">
                <p>Hotel Neptune</p>
                <div class="stars">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                        <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                        <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                        <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                        <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 33" class="star">
                        <path d="M18 0L22.0413 12.4377H35.119L24.5389 20.1246L28.5801 32.5623L18 24.8754L7.41987 32.5623L11.4611 20.1246L0.880983 12.4377H13.9587L18 0Z" fill="#CBA135" />
                    </svg>
                </div>
            </a>
        </li>
        <li><a class="nav-element UnderlineAnim" href="/HotelNeptune/search">Suites</a></li>
        <li><a class="nav-element UnderlineAnim" href="/HotelNeptune/resto">Restauration</a></li>
        <li><a class="nav-element UnderlineAnim" href="/HotelNeptune/activite">Activités</a></li>
        <li><a class="nav-element UnderlineAnim" href="/HotelNeptune/services">Services</a></li>
        <?php if (!empty($_SESSION['id']) && $_SESSION['isAdmin'] == 1) { ?>
            <li><a class="nav-element UnderlineAnim" href="/HotelNeptune/admin">admin</a></li>
        <?php }
        if (empty($_SESSION['id'])) { ?>
            <li><a class="nav-element button" href="/HotelNeptune/login">Connexion</a></li>
        <?php } else { ?>
            <li><a class="nav-element" href="/HotelNeptune/profil"><img class="profilimage" src="/HotelNeptune/image/icons/pngegg.png" alt="Image de profil"></a></li>
        <?php } ?>
    </ul>
</nav>