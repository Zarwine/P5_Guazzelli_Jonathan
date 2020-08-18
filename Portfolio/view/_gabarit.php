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
    <footer>    <div class="contact_footer">
        <div class="footer_up">
            <a href="https://www.linkedin.com/in/jonathan-guazzelli-34908718b/" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com/jonathan.guazzelli?ref=bookmarks" target="_blank"><i class="fab fa-facebook"></i></a>
        </div>
        <div class="footer_left">
            <h4>DÉVELOPPEUR INFORMATIQUE</h4>
            <p>Développeur Web front & back-end & Webdesigner, je suis ouvert à tout type de projets de création de sites internet, de développement spécifique ou d'applications web.</p>
            <p>Passionné par les technologies liées au Web, j'adore élargir mes compétences et explorer le monde de la programmation.</p>
        </div>
        <div class="footer_right">
            <div class="footer_right_container">
                <h4>JONATHAN GUAZZELLI</h4>
            </div>
            <div class="footer_right_container">
                <i class="fas fa-map-marker-alt"></i>
                <a href="https://www.google.fr/maps/place/13720+La+Bouilladisse/@43.3942393,5.6085319,14z/data=!3m1!4b1!4m5!3m4!1s0x12c9993d37b7da9f:0x40819a5fd970490!8m2!3d43.394132!4d5.593219" target="_blank">
                    <p>13720 La Bouilladisse</p>
                </a>
            </div>
            <div class="footer_right_container">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:+33614956732">
                    <p>(+33) 6 14 95 67 32</p>
                </a>
            </div>
            <div class="footer_right_container">
                <i class="fas fa-envelope"></i>
                <a href="mailto:jonathanguazzelli@hotmail.fr">
                    <p>jonathanguazzelli@hotmail.fr</p>
                </a>
            </div>
            <div class="footer_right_container">
                <i class="fas fa-user-tie"></i>
                <a href="https://jogu.fr">
                    <p>https://jogu.fr</p>
                </a>
            </div>
        </div>
    </div>
    </footer>
    <div class="btn_up">
            <a id="cRetour" href="#"><i class="fas fa-angle-double-up icon-btn_up"></i></a>
        </div>
    <script src="<?php echo ASSETS; ?>js/IntersectionObserver.js"></script>
    <script src="<?php echo ASSETS; ?>js/BackToTop.js"></script>
    <script src="<?php echo ASSETS; ?>js/alert.js"></script>
    <script src="<?php echo ASSETS; ?>js/_app.js"></script>
</body>

</html>