<header id="main-header">
    <div class="header-top flex-items py-1">
        <div id="wrapper-logo">
            <a href="<?php echo URLROOT ?>" title="Retournez à la page d'accueil">
                <img id="logo" src="<?php echo URLROOT ?>/img/logo-petit-commerce.png" alt="logo-petit-commerce">
            </a>
        </div>
        <div id="researches-wrapper">
            <form action="<?php echo URLROOT; ?>/products/search" method="post" id="form-auto-researche">
                <?php flash('loggedIn_success'); ?>
                <label id="search-label" for="auto-researche">
                    <input type="text" name="critere" id="auto-researche" placeholder="Recherchez un article..." autocomplete="on">
                </label>
            </form>
        </div>
        <div id="users-tools-header" class="flex-items">
            <div id="nav-link-my-account" class="flex-items-columns px-1">
                <i class="fas fa-user-circle"></i>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <span><?php echo ucfirst($_SESSION['user_prenom']) . ' ' . ucfirst($_SESSION['user_nom']) ?></span>
                <?php else : ?>
                    <span>Mon Compte</span>
                <?php endif ?>
                <div id="my-account" class="px-1">
                    <div class="py-1">
                        <?php if (isset($_SESSION['user_id'])) : ?>
                            <i class="fas fa-sign-out-alt"></i><a href="<?php echo URLROOT; ?>/users/logout" class="links-my-account">Deconnexion</a>
                        <?php else : ?>
                            <a href="<?php echo URLROOT ?>/users/login" class="links-my-account">Se connecter </a>/<a href="<?php echo URLROOT ?>/users/register" class="links-my-account"> S'incrire</a>
                        <?php endif ?>
                    </div>
                    <div class="py-1">
                        <i class="fas fa-user-circle"></i><a href="<?php echo URLROOT ?>/profiles/index" class="links-my-account">Mon profil</a>
                    </div>
                    <div class="py-1">
                        <i class="fas fa-clipboard-list"></i><a href="<?php echo URLROOT ?>/orders/index" class="links-my-account">Mes commandes</a>
                    </div>
                </div>
            </div>
            <a href="<?php echo URLROOT; ?>/products/cart" class="nav-link flex-items-columns px-2">
                <i class="fas fa-shopping-cart"> <?php echo numberOfProductsCart(); ?></i>
                <span>Mon Panier</span>
            </a>
        </div>
    </div>
    <nav id="navbar">
        <!-- MENU -->
        <div id="menu">
            <ul id="main-menu" class="flex-items">
                <li class="submenu-header-bottom px-2">
                    femme
                    <div class="menu-content px-3">
                        <div class="container grid-items">
                            <div class="banner py-3">
                                <!-- <a href=""> -->
                                <img src="<?php echo URLROOT ?>/img/menu/menu-banners/3-chemise.jpg" alt="">
                                <!-- </a> -->
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Vêtements</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/blouses">Blouse</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/chemise">Chemise</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/pantalon">Pantalon</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/pull">Pull</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/tShirt">T-shirts</a></li>
                                </ul>
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Chaussures</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/escarpins">Escarpins</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/balerinnes">Balerinnes</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/bottes">Bottes</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/baskets">Baskets</a></li>
                                </ul>
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Accessoires</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/sacs">Sacs</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/echarpes">Echarpes</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/ceintures">Ceintures</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/montres">Montres</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/bijoux">Bijoux</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="submenu-header-bottom px-2">
                    homme
                    <div class="menu-content px-3">
                        <div class="container grid-items">
                            <div class="banner py-3">
                                <!-- <a href=""> -->
                                <img src="<?php echo URLROOT ?>/img/menu/menu-banners/ii-t-shirt.jpg" alt="">
                                <!-- </a> -->
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Vêtements</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/tShirts">T-shirts</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/pantalon">Pantalon</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/pull">Pull</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/manteau">Manteau</a></li>
                                </ul>
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Chaussures</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/sneakers">Sneakers</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/boots">Boots</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/deville">DeVille</a></li>
                                </ul>
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Accessoires</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/echarpes">Echarpes</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/montres">Montres</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="submenu-header-bottom px-2">
                    nouveautés
                    <div class="menu-content px-3">
                        <div class="container grid-items">
                            <div class="banner py-3">
                                <!-- <a href=""> -->
                                <div class="headband-new text-center"><span>New</span></div>
                                <img src="<?php echo URLROOT ?>/img/menu/menu-banners/i-i-pull.jpg" alt="">
                                <!-- </a> -->
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Femmes</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/newVetements">Vêtements</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/newChaussures">Chaussures</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/women/newAccessoires">Accessoires</a></li>
                                </ul>
                            </div>
                            <div class="submenu-content text-center py-3">
                                <a href="" class="title-submenu-content">Hommes</a>
                                <ul class="list-menu femme py-2">
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/newVetements">Vêtements</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/newChaussures">Chaussures</a></li>
                                    <li class="items-menu py-1"><a class="links-items-menu" href="<?php echo URLROOT ?>/men/newAccessoires">Accessoires</a></li>
                                </ul>
                            </div>
                            <div class="banner py-3">
                                <!-- <a href=""> -->
                                <div class="headband-new text-center"><span>New</span></div>
                                <img src="<?php echo URLROOT ?>/img/menu/menu-banners/iii-i-pull.jpg" alt="">
                                <!-- </a> -->
                            </div>
                        </div>

                    </div>
                </li>
                <li class="submenu-header-bottom px-2">
                    <a href="<?php echo URLROOT ?>/bestSellers/index">top ventes</a>
                </li>
                <li class="submenu-header-bottom px-2">
                    communauté
                    <div class="menu-content grid-items-communaute px-3 main-communities">
                        <a href="<?php echo URLROOT ?>/communities/events">
                            <div class="communities-navbar-events">
                                <span class="text-communaute">Participez à nos événements</span>
                            </div>
                        </a>
                        <a href="<?php echo URLROOT ?>/communities/aboutus">
                            <div class="communities-navbar-aboutus">
                                <span class="team text-communaute">Qui sommes nous ?</span>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>