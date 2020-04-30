<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="sidebar">
    <div class="sidebar_arrow"><i class="fas fa-long-arrow-alt-right"></i></div>
    <h2>Mes réalisations</h2>
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
    <h1>Section services</h1>
    <h2>Un sous titre</h2>
    <div class="service_container">
        <div class="liste_gauche">
            <ul>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du service sur plusieurs lignes.Description du service.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du serviceDescription du service sur plusieurs.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du serviceDescription du service sur plusieurs lignes.Description.</p>
                </li>
            </ul>
        </div>
        <img src="<?php echo ASSETS; ?>img/section_service_img.jpg" alt=''>
        <div class="liste_droite">
            <ul>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du serviceDescription du service sur plusieurs</p>
                </li>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du serviceDescription du service sur plusieurs lignes.</p>
                </li>
                <li>
                    <i class="icone_service fas fa-wrench"></i>
                    <h4>nom du service</h4>
                    <p>Description du serviceDescription du service.</p>
                </li>
            </ul>
        </div>
    </div>
</section>

<a class="anchor" id="anchor_section_competence"></a>
<section id="section_competence">
    <h1>Section competences</h1>
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
            <li>Programmation orientée objet</li>
            <li>Architecture MVC</li>
            <li>Gestion de sessions utilisateur ( + hiérarchie )</li>
            <li>Récupérations et stockage de donnée</li>
            <li>Protection faille XSS</li>
            <li>Protection injection SQL</li>
            <li>Protection Brutforce</li>
            <li>Utilisation de Namespaces</li>
            <li>création de template HTML</li>
            <li>Hashage de donnée</li>
        </ul>
        <h4 class="comp_sql">SQL</h4>
        <ul class="descr_sql">
            <li>Mise en place d'une base de donnée</li>
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
    <div id="pf_articles_JSON"><?php var_dump($pf_articles_JSON); ?></div>
</section>
<section id="section_portfolio">
    <div class="titre_livre article_content diapo_visible">
        <h1>Mes réalisations</h1>
        <a class="port_link" href="<?php echo HOST; ?>portfolio">Voir le portfolio complet</a>
        <p>Un paragraphe qui présente mes réalisations dans l'ensemble.
            Un paragraphe qui présente mes réalisations dans l'ensemble.
            Un paragraphe qui présente mes réalisations dans l'ensemble.
            Un paragraphe qui présente mes réalisations dans l'ensemble.
            Un paragraphe qui présente mes réalisations dans l'ensemble.
        </p>
        <p>Cliquez sur les flèches pour visualiser les différents projets</p>
    </div>
    <div class="diapo_container">
        <?php foreach ($pf_articles as $pf_article) : ?>
            <div class="article_content diapo_invisible">
                <h3 class="titre_article"><?php echo htmlspecialchars($pf_article->getName()); ?></h3>
                <?php echo $pf_article->getContent(); ?>
                <br />

                <div class="button_container">
                    <div class="link_jf">
                        <a href="<?php echo HOST; ?>view/id/<?php echo $pf_article->getId(); ?>">
                            Commentaires ...
                        </a>
                    </div>
                </div>
                <?php if (isset($_SESSION['auth'])) : ?>
                    <?php if ($_SESSION['auth']->admin == 1) : ?>
                        <div class="button_container">
                            <div class="link_jf">
                                <a href="<?php echo HOST; ?>modification/id/<?php echo $pf_article->getId(); ?>">
                                    Éditer
                                </a>
                            </div>
                            <div class="link_jf link_jf_alert">
                                <a href="<?php echo HOST; ?>delete/id/<?php echo $pf_article->getId(); ?>">
                                    Effacer
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="btn_container btn_container_bottom">
        <a href="#anchor_section_portfolio" id="slider_prev_bottom"><i class="fas fa-arrow-circle-left icon-burger"></i></a>
        <a href="#anchor_section_portfolio" id="slider_next_bottom"><i class="fas fa-arrow-circle-right icon-burger"></i></a>
    </div>
</section>

<a class="anchor" id="anchor_section_apropos"></a>
<section id="section_apropos">
    <div class="about_container">
        <div class="about_text">
            <h4>A propos de moi..</h4>
            <p>Afin de fournir une prestation recommandable, je me tiens au courant des nouveautés.
                J'observe ce qu'il se fait de meilleur et j'aime apprendre.
                Le monde du développment englobe mon quotidien.
                Il se retrouve dans mes réseaux sociaux, mes loisirs, mon couple ...
                Ce n'est que depuis peu que je peux enfin emprunter ce chemin que je n'observai alors que de loin
                Et j'ai bien l'intention d'enrichir mes connaissances chaque jour.
                Ce paragraphe va être édité parcequ'il est pas ouf</p>
            <a class="button_jf" href="<?php echo ASSETS; ?>CV-2020.pdf" download="<?php echo ASSETS; ?>CV-2020.pdf" target="_blank">Télécharger mon CV</a>
        </div>
        <figure>
            <a href="#"><img class="about_myself" src="<?php echo ASSETS; ?>img/IMG_20200209_130037_recadre_BW.jpg" alt='Jonathan Guazzelli'></a>
            <figcaption></figcaption>
        </figure>
    </div>
</section>

<a class="anchor" id="anchor_section_contact"></a>
<section id="section_contact">
    <div class="contact_container">
        <h1>Section Contact</h1>
        <form class="jf_form" action="contact_form" method="POST">
            <div class="form-group">
                <label for="">Nom & Prénom :</label>
                <input id="username" placeholder="Nom Prénom..." type="text" name="username" />
                <div id="error_username"></div>
            </div>
            <div class="form-group">
                <label for="">E-mail :</label>
                <input id="email" placeholder="exemple@info.com" type="email" name="email" />
                <div id="error_email"></div>
            </div>
            <div class="form-group">
                <label for="">Votre Message :</label>
                <textarea name="message" id="comment_textarea" cols="30" rows="10" placeholder="Votre message..."></textarea>
                <div id="error_message"></div>
            </div>
            <button id="btn_contact" type="submit" class="button_jf">ENVOYER</button>
        </form>
    </div>
    <div class="contact_footer"></div>
</section>

<!--<script src="<?php echo ASSETS; ?>js/diaporamaContent.js"></script>-->
<script src="<?php echo ASSETS; ?>js/diaporama.js"></script>