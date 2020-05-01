<?php

use Portfolio\classes\DateFormat;
?>

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