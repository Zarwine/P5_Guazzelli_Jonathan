<?php

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jonathan Guazzelli - Développeur web</title>
    <meta name="description" content="Portfolio de Jonathan Guazzelli">
    <link rel="shortcut icon" type="image/ico" href="<?php echo ASSETS; ?>/img/user-tie-solid.svg">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo ASSETS; ?>fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="nav-item">
                <a href='https://jogu.fr/home'>
                    <h1>Jonathan Guazzelli</h1>
                </a>
            </div>
            <ul class="nav-item end-row">

                <?php if (strpos($_SERVER['REQUEST_URI'], "home") !== false) : ?>
                    <li class="link_jf">
                        <a class="smart_ancre1" href="#anchor_section_service">Services</a>
                    </li>
                    <li class="link_jf">
                        <a class="smart_ancre2" href="#anchor_section_competence">Compétences</a>
                    </li>
                    <li class="link_jf">
                        <a class="smart_ancre3" href="#anchor_section_portfolio">Portfolio</a>
                    </li>
                    <li class="link_jf">
                        <a class="smart_ancre4" href="#anchor_section_apropos">A propos</a>
                    </li>
                    <li class="link_jf">
                        <a class="smart_ancre5" href="#anchor_section_contact">Contact</a>
                    </li>
                    <li class="separateur_menu">|</li>
                <?php endif; ?>
                <?php if (isset($_SESSION['auth'])) : ?>
                    <?php if ($_SESSION['auth']->admin == 1) : ?>
                        <li class="link_jf">
                            <a href="<?php echo HOST; ?>create">
                                Ajouter un article
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="link_jf">
                        <a href="<?php echo HOST; ?>account">
                            Mon compte
                        </a>
                    </li>
                    <li class="link_jf">
                        <a href="<?php echo HOST; ?>logout">
                            Se déconnecter
                        </a>
                    </li>
                <?php else : ?>
                    <li class="link_jf">
                        <a href="<?php echo HOST; ?>register">
                            S'inscrire
                        </a>
                    </li>
                    <li class="link_jf">
                        <a href="<?php echo HOST; ?>login">
                            Se connecter
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="menu-burger-main">
                <div class="nav-wrapper">
                    <input type="checkbox" id="menu_checkbox" class="menu_checkbox">
                    <label for="menu_checkbox" class="menu-toggle">
                        <img class="icon-burger" src="<?php echo ASSETS; ?>img/bars-solid.svg" alt="icone burger">
                    </label>
                    <ul class="menu-burger">
                        <?php if (isset($_SESSION['auth'])) : ?>
                            <?php if ($_SESSION['auth']->admin == 1) : ?>
                                <li class="link_jf">
                                    <a href="<?php echo HOST; ?>create">
                                        Ajouter un article
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="link_jf">
                                <a href="<?php echo HOST; ?>account">
                                    Mon compte
                                </a>
                            </li>
                            <li class="link_jf">
                                <a href="<?php echo HOST; ?>logout">
                                    Se déconnecter
                                </a>
                            </li>
                        <?php else : ?>
                            <li class="link_jf">
                                <a href="<?php echo HOST; ?>register">
                                    S'inscrire
                                </a>
                            </li>
                            <li class="link_jf">
                                <a href="<?php echo HOST; ?>login">
                                    Se connecter
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (strpos($_SERVER['REQUEST_URI'], "home") !== false) : ?>
                            <li><hr></li>
                            <li class="link_jf">
                                <a class="smart_ancre1" href="#anchor_section_service">Services</a>
                            </li>
                            <li class="link_jf">
                                <a class="smart_ancre2" href="#anchor_section_competence">Compétences</a>
                            </li>
                            <li class="link_jf">
                                <a class="smart_ancre3" href="#anchor_section_portfolio">Portfolio</a>
                            </li>
                            <li class="link_jf">
                                <a class="smart_ancre4" href="#anchor_section_apropos">A propos</a>
                            </li>
                            <li class="link_jf">
                                <a class="smart_ancre5" href="#anchor_section_contact">Contact</a>
                            </li>
 
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main id="main_content" class="article_container">

        <div class="notif">
            <?php if (isset($_SESSION['flash'])) : ?>
                <?php foreach ($_SESSION['flash'] as $type => $message) : ?>
                    <div class="alert alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>
        </div>

        <?php echo $contentPage; ?>
    </main>
    <footer>
        <div class="btn_up">
            <a id="cRetour" href="#"><i class="fas fa-arrow-circle-up icon-btn_up"></i></a>
        </div>
    </footer>
    <script src="<?php echo ASSETS; ?>js/alert.js"></script>
    <script src="<?php echo ASSETS; ?>js/_app.js"></script>
</body>

</html>