<?php ob_start(); ?>


<div class="container">
    <?php foreach ($myAnimes as $anime) : ?>
        <div class='p-3 mt-5 text-white'>
            <h4 class="text-white"><?= $anime['titre'] ?></h4>
            <p><?= $anime['descri'] ?></p>
        </div>
        <div class='d-flex justify-content-center p-3'>
            <iframe class="col-lg-12" width="1100" height="430" src="<?= $anime['video'] ?>" . $video . frameborder="0" allowfullscreen></iframe>
        </div>
        <div class="mt-5">
            <?php if (!empty($_SESSION['roleUser'])) : ?>
                <form action='<?= URL ?>ma-collection/add/<?= $anime['id'] ?>' method='post'>
                    <button id='btn' class='btn btn-sm rounded-1 d-flex align-items-center'>
                        Ajouter à ma collection
                    </button>
                </form>
            <?php else : ?>
                <a href="<?= URL ?>connexion" class="btn btn-sm rounded-1" id="btn">Ajouter à ma collection</a>
            <?php endif ?>
        </div>
    <?php endforeach ?>



    <?php if (!isset($_SESSION['id'])) : ?>
        <div class="container mt-5">
            <div class=" mb-3 pt-3" style="max-width: 30rem;border: 0.0625rem dashed #dadada;">
                <div class="text-white d-flex justify-content-center">
                    <h4 class="text-white">Compte Requis</h4>
                </div>
                <div class="text-white d-flex justify-content-center">
                    <p><a href="<?= URL ?>connexion" style="color:RGB(244, 117, 33);">Se connecter </a> ou <a href="<?= URL ?>inscription" style="color:RGB(244, 117, 33);">Créer un compte</a> pour commenter</p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container mt-5">
            <h4 class="text-white">Laisser un commentaire</h4>
            <form action="./../src/component/comment.php" method="post" class="w-50">
                <div class="form-group ">
                    <textarea name="comment" class="form-control" id="exampleTextarea" rows="3" style="height: 92px;"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <h4 class='text-white container'>Commentaires</h4>

        <!-- <?php foreach ($comments as $comment) : ?>
            <div class="container mt-5">
                <div class="card" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text"><?= $comment['comment'] ?></p>
                        <?php if (isset($_SESSION['roleUser']) && $_SESSION['roleUser'] == 1) : ?>
                            <a href="<?= URL ?>commentaire/supprimer/<?= $comment['id'] ?>" class="btn btn-sm rounded-1" id="btn">Supprimer</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> -->
    <?php endif; ?>
</div>

<?php
var_dump($comments);
$class = "container-fluid";
$content = ob_get_clean();
require_once "view/base.html.php";

?>