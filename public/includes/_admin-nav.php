<header class="admin">
<<<<<<< HEAD
    <h3 class="admin__responsive-logo">CARBON</h3>
=======
    <img src="../images/backgrounds/logo.png" alt="" class="admin__responsive-logo">
>>>>>>> ambre-dev

    <nav class="admin__nav" id="admin-menu">
        <ul class="admin__nav__list">
            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Utilisateurs</a></li>
            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Ressources</a></li>

<<<<<<< HEAD
            <li class="admin__nav__list__element admin__nav__logo"><img src="images/logos/logo.png" alt="Logo" class="admin__nav__list__element__logo"></li>
=======
            <li class="admin__nav__list__element admin__nav__logo"><img src="../images/backgrounds/logo.png" alt="Logo" class="admin__nav__list__element__logo"></li>
>>>>>>> ambre-dev

            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Partenaires</a></li>
            <li class="admin__nav__list__element">
                <form class="admin__nav__list__element__div" id="logout-btn" method="POST" action="logout.php">
                    <button type="submit"><?= $_SESSION['user_name']?><i class="fa-solid fa-right-from-bracket" id="logout-icon"></i></button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="admin__burger-hidden" id="burger-btn">
        <hr class="admin__burger__first">
        <hr class="admin__burger__middle">
        <hr class="admin__burger__last">
    </div>
</header>