<?php $title = 'Modification d\'un commentaire'; ?>

<?php ob_start(); ?>
<h1>Modifier le commentaire <?= $comment['id'] ?> du <?= $comment['comment_date_fr'] ?></h1>

<p><a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</a></p>
<div class="updateForm">
    <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"><?= htmlspecialchars($comment['comment']) ?></textarea>
        </div>
        <div>
            <input type="hidden" name="post_id" value="<?= $comment['post_id'] ?>">
            <input type="submit" />
        </div>
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>