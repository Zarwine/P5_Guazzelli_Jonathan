<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
<div class="sidebar">
    <div class="sidebar_arrow"><i class="fas fa-long-arrow-alt-right"></i></div>
    <h2>Mes réalisations</h2>
    <br/>
    <ul>
        <?php foreach($pf_articles as $pf_article): ?>
            <li>
                <a href="<?php echo HOST;?>view/id/<?php echo $pf_article->getId();?>" class="titre_article"><?php echo htmlspecialchars($pf_article->getName());?></a>
                <br/>
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
            </li><li>
                <i class="icone_service fas fa-wrench"></i>
                <h4>nom du service</h4>
                <p>Description du serviceDescription du service sur plusieurs lignes.</p>
            </li><li>
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
</section>

<a class="anchor" id="anchor_section_portfolio"></a>
<section id="section_portfolio">
    <div class="titre_livre article_content diapo_visible">
        <h1>Mes réalisations</h1>
        <p>Un paragraphe qui présente mes réalisations dans l'ensemble.
             Un paragraphe qui présente mes réalisations dans l'ensemble.
             Un paragraphe qui présente mes réalisations dans l'ensemble.
             Un paragraphe qui présente mes réalisations dans l'ensemble.
             Un paragraphe qui présente mes réalisations dans l'ensemble. 
        </p>
    <p>Cliquez sur les flèches pour visualiser les différents projets</p>
    </div>
    <div class="diapo_container">
        <?php foreach($pf_articles as $pf_article): ?>
            <div class="article_content diapo_invisible">
                <h3 class="titre_article"><?php echo htmlspecialchars($pf_article->getName());?></h3>
                <?php echo $pf_article->getContent();?>
                <br/>
            
                <div class="button_container">
                    <div class="link_jf">
                        <a href="<?php echo HOST;?>view/id/<?php echo $pf_article->getId();?>">
                        Commentaires ...
                        </a>
                    </div>
                </div>
                <?php if (isset($_SESSION['auth'])): ?>
                <?php if ($_SESSION['auth']->admin == 1): ?>             
                <div class="button_container">
                    <div class="link_jf">
                        <a href="<?php echo HOST;?>modification/id/<?php echo $pf_article->getId();?>">
                        Éditer
                        </a>
                    </div>
                    <div class="link_jf link_jf_alert">
                        <a href="<?php echo HOST;?>delete/id/<?php echo $pf_article->getId();?>">
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
        <h4>A propos de moi</h4>
        <p>Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla 
        Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla 
        Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla 
        Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla 
        Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla Du bla bla à propos de moi, bla bla bla 
        Du bla bla à propos de moi, bla bla bla 
        </p>
        <a class="about_button" href="#">Télécharger mon CV</a>
    </div>
    <figure>
    <a href="#"><img class="about_myself" src="<?php echo ASSETS; ?>img/IMG_20200209_130037_recadre_BW.jpg" alt='Jonathan Guazzelli'></a>
        <figcaption></figcaption>
    </figure>
</div>
</section>

<a class="anchor" id="anchor_section_contact"></a>
<section id="section_contact">
<h1>Section Contact</h1>
</section>

<!--<script src="<?php echo ASSETS;?>js/diaporamaContent.js"></script>-->
<script src="<?php echo ASSETS;?>js/diaporama.js"></script>
