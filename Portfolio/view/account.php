<?php session_start();
if ($_SESSION['auth']->username == NULL) {
    $_SESSION['alert']['danger'] = "Il faut vous connecter";
    header('Location: login');
}

use Portfolio\classes\DateFormat;

?>
<div class="page_container">
    <div class="account_header">
        <h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
        <h3>Bienvenue dans votre espace membre</h3>
    </div>
    <?php if ($_SESSION['auth']->admin == 1) : ?>

        <div class="account_crud">
            <h3>Agir sur les articles</h3>
            <ul>
                <li class="link_jf">
                    <a href="<?php echo HOST; ?>create">
                        Ajouter un article
                    </a>
                </li>
                <li class="link_jf">
                    <a class="view_account">
                        Voir les articles existants
                    </a>
                </li>
            </ul>
        </div>

        <div id="account_view_article" class="container_not_visible">
            <?php foreach ($pf_articles as $pf_article) : ?>
                <div class="article_content">
                    <a href="<?php echo HOST; ?>view/id/<?php echo $pf_article->getId(); ?>" class="titre_article_admin">
                        <h3><?php echo htmlspecialchars($pf_article->getName()); ?></h3>
                    </a>
                    <div id="<?php echo $pf_article->getId(); ?>" class="article">
                        <p>id = <?php echo $pf_article->getId(); ?></p>
                        <?php echo $pf_article->getContent(); ?>
                        <br />
                    </div>
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
                </div>
            <?php endforeach; ?>
            <div id="pagination_nav_article">
                <div class="prev_page"></div>
                <div class="page"></div>
                <div class="next_page"></div>
            </div>
        </div>
    <?php endif; ?>


    <?php if ($_SESSION['auth']->admin == 1) : ?>
        <div class="account_crud">
            <h3>Agir sur les commentaires</h3>
            <ul>
                <li class="link_jf">
                    <a class="view_comment">
                        Voir tous les commentaires
                    </a>
                </li>
                <li class="link_jf">
                    <a class="view_comment_reported">
                        Voir les commentaires signalés
                    </a>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    <div id="account_view_comment" class="comment_container container_not_visible">
        <div class="recadrage">
            <div id="com_pagination_container">
                <div id="com_pagination_prev"><i class="fas fa-backward"></i></div>
                <div id="com_pagination_pages">
                </div>
                <div id="com_pagination_next"><i class="fas fa-forward"></i></div>
            </div>
        </div>
        <div class="comment_bis">
            <?php foreach ($pf_comments as $pf_comment) : ?>

                <div class="article_comment_account com_invisible">
                    <div id="<?php echo $pf_comment->getId(); ?>" class="comment">
                        <p>De <?php echo $pf_comment->getAuteur(); ?></p>
                        <p class="com_date">Écrit le : <?php echo DateFormat::dateFormat($pf_comment->getCreated_at()); ?></p>

                        <?php if ($pf_comment->getEdited_at() !== NULL) : ?>
                            <p class="com_date">Édité le : <?php echo DateFormat::dateFormat($pf_comment->getEdited_at()); ?></p>
                        <?php endif ?>
                        <p><?php echo htmlspecialchars($pf_comment->getContent()); ?></p>
                        <br />
                    </div>
                    <div class="button_container">
                        <?php if ($pf_comment->getAuteur() == $_SESSION['auth']->username) : ?>
                            <div class="editer link_jf">
                                <a href="<?php echo HOST; ?>comModif/id/<?php echo $pf_comment->getId(); ?>">
                                    Éditer
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="link_jf link_jf_alert">
                            <a href="<?php echo HOST; ?>comDeleteAd/id/<?php echo $pf_comment->getId(); ?>">
                                Effacer
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div id="account_view_comment_reported" class="comment_container container_not_visible">
        <div class="reported_comment">
            <?php foreach ($pf_comments as $pf_comment) : ?>
                <?php if ($pf_comment->getReported() == 1) : ?>

                    <div class="article_comment_account">
                        <div id="<?php echo $pf_comment->getId(); ?>" class="comment">
                            <p>De <?php echo $pf_comment->getAuteur(); ?></p>
                            <p class="com_date">Écrit le : <?php echo DateFormat::dateFormat($pf_comment->getCreated_at()); ?></p>

                            <?php if ($pf_comment->getEdited_at() !== NULL) : ?>
                                <p class="com_date">Édité le : <?php echo DateFormat::dateFormat($pf_comment->getEdited_at()); ?></p>
                            <?php endif ?>
                            <p><?php echo htmlspecialchars($pf_comment->getContent()); ?></p>
                            <p class="reported">Commentaire signalé</p>
                            <br />
                        </div>
                        <div class="button_container">
                            <?php if ($pf_comment->getAuteur() == $_SESSION['auth']->username) : ?>
                                <div class="editer link_jf">
                                    <a href="<?php echo HOST; ?>comModif/id/<?php echo $pf_comment->getId(); ?>">
                                        Éditer
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="link_jf link_jf_alert">
                                <a href="<?php echo HOST; ?>comAcquit/id/<?php echo $pf_comment->getId(); ?>">
                                    Acquitter
                                </a>
                            </div>
                            <div class="link_jf link_jf_alert">
                                <a href="<?php echo HOST; ?>comDeleteAd/id/<?php echo $pf_comment->getId(); ?>">
                                    Effacer
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="account_gestion">
        <h2>Gestion du compte</h2>

        <form class="jf_form jf_form_article" action="changePassword" method="post">
            <h3>Changement de votre mot de passe</h3>
            <p class="acc_detail">Si vous le souhaitez, vous pouvez changer votre mot de passe.</p>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Changer de mot de passe" />
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirm" placeholder="Confirmation du mot de passe" />
            </div>
            <button class="button_jf link_jf_alert">Changer de mot de passe</button>
        </form>
    </div>

    <?php if ($_SESSION['auth']->admin == 1) : ?>
        <script src="<?php echo ASSETS; ?>js/account.js"></script>
        <script src="<?php echo ASSETS; ?>js/accountPagination.js"></script>
    <?php endif; ?>

</div>