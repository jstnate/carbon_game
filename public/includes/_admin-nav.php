
<header class="admin">
    <img src="images/avatars/avatar3.PNG" alt="" class="admin__responsive-logo">

    <nav class="admin__nav" id="admin-menu">
        <ul class="admin__nav__list">
            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Utilisateurs</a></li>
            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Ressources</a></li>

            <li class="admin__nav__list__element admin__nav__logo"><img src="images/avatars/avatar3.PNG" alt="Logo" class="admin__nav__list__element__logo"></li>

            <li class="admin__nav__list__element"><a href="" class="admin__nav__list__element__link">Partenaires</a></li>
            <li class="admin__nav__list__element">
                <div class="admin__nav__list__element__div" id="logout-btn">
                    <span><?= $_SESSION['user_name']?><i class="fa-solid fa-chevron-down" id="logout-icon"></i></span>
                    <a href="" class="admin__nav__list__element__link" id="logout-message">Se déconnecter</a>
                </div>
            </li>
        </ul>
    </nav>

    <div class="admin__burger-hidden" id="burger-btn">
        <hr class="admin__burger__first">
        <hr class="admin__burger__middle">
        <hr class="admin__burger__last">
    </div>
</header>