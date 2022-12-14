<header class="admin">
    <h3 class="admin__responsive-logo">CARBON</h3>

    <nav class="admin__nav" id="admin-menu">
        <ul class="admin__nav__list">
            <li class="admin__nav__list__element"><a href="dashboard-users.php" class="admin__nav__list__element__link">Utilisateurs</a></li>
            <li class="admin__nav__list__element"><a href="dashboard-cards.php" class="admin__nav__list__element__link">Ressources</a></li>

            <li class="admin__nav__list__element admin__nav__logo"><a href="dashboard-admin.php"><img src="images/logos/logo.png" alt="Logo" class="admin__nav__list__element__logo"></a></li>

            <li class="admin__nav__list__element"><a href="dashboard-partners.php" class="admin__nav__list__element__link">Partenaires</a></li>
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