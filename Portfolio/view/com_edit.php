<div id="container" class="page_container">
    <h2>éditer un commentaire</h2>

    <?php if (isset($pf_comment)) : ?>
        <form class="jf_form" action="<?php echo HOST; ?>com_edit" method="post">

            <?php if ($pf_comment->getId()) : ?>
                <input type="hidden" name="values[id]" value="<?php echo $pf_comment->getId(); ?>" />
            <?php endif; ?>

            Contenu du commentaire : <textarea id="edit_comment_text_area" class="comment_text_area" name="values[content]"><?php echo $pf_comment->getContent(); ?></textarea><br />
            <input class="button_jf" type="submit" value="éditer" />

        </form>
    <?php endif; ?>
</div>