<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="sidebar">
    <div class="sidebar_arrow"><i class="fas fa-long-arrow-alt-right"></i></div>
    <h2>Section commentaires</h2>
    <p>Vous pouvez voir et poster des commentaires sur les projets suivants :</p>
    <br />
    <ul>
        <?php foreach ($pf_articles as $pf_article) : ?>
            <li>
                <a href="<?php echo HOST; ?>view/id/<?php echo $pf_article->getId(); ?>" class="titre_article"><?php echo htmlspecialchars($pf_article->getName()); ?></a>
                <br />
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<section id="section_intro">
    <div class="bienvenue">
        <h1>Bienvenue !</h1>
        <h3>Je m'appelle Jonathan et je suis développeur web</h3>
    </div>
</section>

<a class="anchor" id="anchor_section_service"></a>
<section id="section_service">
    <h1>Mes services</h1>
    <h2>Des prestations adaptées à vos besoins</h2>
    <div class="service_container">
        <div class="liste_gauche">
            <ul>
                <li>
                    <i class="icone_service fas fa-user-cog"></i>
                    <h4>Gestion de projets web</h4>
                    <p>Site vitrine, corporate, évènementiel, application mobile.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-code"></i>
                    <h4>Intégration web</h4>
                    <p>Des intégrations HTML/CSS respectueuses des standards du Web.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-project-diagram"></i>
                    <h4>Référencement naturel</h4>
                    <p>Affichage sémantique des informations, des pages propres pour référencement optimal.</p>
                </li>
            </ul>
        </div>
        <img src="<?php echo ASSETS; ?>img/section_service_img.jpg" alt=''>
        <div class="liste_droite">
            <ul>
                <li>
                <i class="icone_service fas fa-pen"></i>
                    <h4>Dynamisme des pages</h4>
                    <p>Des animations de contenu non intrusives pour embellir votre projet.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-tasks"></i>
                    <h4>Interface d'administration</h4>
                    <p>Outils spécifiques au bon fonctionnement de votre entreprise.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-mobile-alt"></i>
                    <h4>Responsiv design</h4>
                    <p>Compatible tous supports, tablette & application mobile.</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<a class="anchor" id="anchor_section_competence"></a>
<section id="section_competence">
    <h1>Mes competences</h1>
    <div class="competence_container">
        <h3 class="HS">hardskill</h3>
        <h3 class="SF">Softskill</h3>
        <ul class="descr_intro">
            <li>Communication</li>
            <li>Travail d'équipe</li>
            <li>Adaptabilité</li>
            <li>Analyse</li>
            <li>Créativité</li>
            <li>Tenacité</li>
        </ul>
        <h4 class="comp_html">HTML</h4>
        <ul class="descr_html">
            <li>Validation w3c</li>
            <li>Accessibilité WCAG</li>
            <li>SEO Naturel Référencement</li>
            <li>Framework Wordpress</li>
            <li>Création de Formulaires</li>
            <li>Police Personnalisée</li>
        </ul>
        <h4 class="comp_css">CSS</h4>
        <ul class="descr_css">
            <li>Flexbox</li>
            <li>Animation CSS3</li>
            <li>Validation w3c</li>
            <li>Responsivité Media Queries</li>
        </ul>
        <h4 class="comp_js">JS</h4>
        <ul class="descr_js">
            <li>Syntaxe ES6</li>
            <li>AJAX</li>
            <li>WebStorage</li>
            <li>Gestion du tactile</li>
            <li>Programmation Orienté Objet</li>
            <li>Manipulation du DOM</li>
            <li>JQuery</li>
        </ul>
        <h4 class="comp_php">PHP</h4>
        <ul class="descr_php">
            <li>Architecture MVC</li>
            <li>Gestion de sessions utilisateur</li>
            <li>Protection faille XSS,SQL ou Bruteforce</li>
            <li>Utilisation de Namespaces</li>
            <li>Création de template HTML</li>
            <li>Hashage de données</li>
        </ul>
        <h4 class="comp_sql">SQL</h4>
        <ul class="descr_sql">
            <li>Mise en place d'une base de données</li>
            <li>Récupérations et stockage de données</li>
            <li>Utilisation de MySQL</li>
            <li>Création de JSON</li>
            <li>Liaison de table</li>
        </ul>
        <h4 class="comp_autre">Autres</h4>
        <ul class="descr_autre">
            <li>LeafLet</li>
            <li>Github</li>
            <li>TinyMCE</li>
            <li>FontAwesome</li>
            <li>VS Code</li>
        </ul>
    </div>
</section>

<a class="anchor" id="anchor_section_portfolio"></a>

<section id="section_portfolio_JSON">
    <h1>Mes réalisations</h1>
    <div class="btn_container btn_container_bottom">
        <a href="#anchor_section_portfolio" id="slider_prev_bottom"><i class="fas fa-arrow-circle-left icon-burger"></i></a>
        <div id="portfolio_pagination_pages">
        </div>
        <a href="#anchor_section_portfolio" id="slider_next_bottom"><i class="fas fa-arrow-circle-right icon-burger"></i></a>
    </div>
    <div class="portfolio_description">
        <p>Visualisez les différents projets sur lesquels j'ai travaillé</p>
    </div>
</section>

<a class="anchor" id="anchor_section_apropos"></a>
<section id="section_apropos">
    <div class="about_container">
        <div class="about_text">
            <h1>A propos</h1>
            <h2>Je suis développeur web et j'aime ça</h2>
            <p>Le monde de l'informatique m'a toujours passionné et plus précisement celui du développement.
                Afin de fournir un travail à la page, je me tiens au courant des nouveautés quotidiennement.
                J'observe ce qu'il se fait de meilleur, j'aime apprendre et découvrir.
                Ce monde englobe mes journées.
                Il se retrouve dans mes réseaux sociaux, mes loisirs et même mon couple ...
                Ce n'est que depuis peu que je peux réellement m'investir dans ce domaine
                et j'ai bien l'intention d'enrichir mes connaissances chaque jour pour exceller dans le développment Web.
            </p>
            <a class="button_jf" href="<?php echo ASSETS; ?>CV-2020.pdf" download="<?php echo ASSETS; ?>CV-2020.pdf" target="_blank">Télécharger mon CV</a>
        </div>
        <figure>
            <a href="<?php echo ASSETS; ?>img/IMG_20200209_130037_recadre.jpg" target="_blank"><img class="about_myself" src="<?php echo ASSETS; ?>img/IMG_20200209_130037_recadre.jpg" alt='Jonathan Guazzelli'></a>
        </figure>
    </div>
</section>

<a class="anchor" id="anchor_section_contact"></a>
<section id="section_contact">
    <div class="contact_container">
        <h1>Me Contacter</h1>
        <form class="jf_form" action="contact_form" method="POST">
            <?php if (isset($_SESSION["auth"]->username)) : ?>
                <div class="form-group">
                    <label for="username">Nom & Prénom :</label>
                    <input id="username" placeholder="<?php echo $_SESSION["auth"]->username; ?>" type="text" name="username" />
                    <div id="error_username"></div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input id="email" placeholder="<?php echo $_SESSION["auth"]->email; ?>" type="email" name="email" />
                    <div id="error_email"></div>
                </div>
            <?php else : ?>
                <div class="form-group">
                    <label for="username">Nom & Prénom :</label>
                    <input id="username" placeholder="Nom Prénom..." type="text" name="username" />
                    <div id="error_username"></div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input id="email" placeholder="exemple@info.com" type="email" name="email" />
                    <div id="error_email"></div>
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label for="comment_textarea">Votre Message :</label>
                <textarea name="message" id="comment_textarea" cols="30" rows="10" placeholder="Votre message..."></textarea>
                <div id="error_message"></div>
            </div>
            <button id="btn_contact" type="submit" class="button_jf">ENVOYER</button>
        </form>
    </div>
    <div class="contact_footer">
    <p>Projet réalisé dans le cadre d'une formation Openclassrooms de novembre 2019 à mai 2020.</p>
    </div>
</section>

<script src="<?php echo ASSETS; ?>js/diaporamaContent.js"></script>
<script src="<?php echo ASSETS; ?>js/contactManager.js"></script>