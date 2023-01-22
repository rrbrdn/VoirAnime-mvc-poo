<?php ob_start(); ?>


<div class="container">
    <?php foreach ($myAnimes as $anime) : ?>
        <?php $id_anime = $anime['id']; ?>
        <div class='p-3 mt-5 text-white d-flex flex-wrap mb-5 grid gap-5'>
            <div class="mb-4 col-lg-3 col-md-12 row">
                    <img src="<?= URL ?>asset/img/<?= $anime['img'] ?>" class="rounded-1" width="250">
                <div class="mt-5 d-flex justify-content-center">
                    <?php if (!empty($_SESSION['roleUser'])) : ?>
                        <form action='<?= URL ?>ma-collection/add/<?= $anime['id'] ?>' method='post'>
                            <button id='btn' class='btn btn-sm rounded-1'>
                                Ajouter à ma collection
                            </button>
                        </form>
                    <?php else : ?>
                        <a href="<?= URL ?>connexion" class="btn btn-sm rounded-1" id="btn">Ajouter à ma collection</a>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-8">
                <h1 class="text-white"><?= $anime['titre'] ?></h1>
                <p><?= $anime['descri'] ?></p>
            </div>
        </div>
        <div class='d-flex justify-content-center p-3'>
            <iframe class="col-lg-12 col-sm-12" width="1100" height="430" src="<?= $anime['video'] ?>" . $video . frameborder="0" allowfullscreen></iframe>
        </div>
    <?php endforeach ?>

    <?php if (!isset($_SESSION['id'])) : ?>
        <div class="mt-5">
            <div class=" mb-3 pt-3" style="max-width: 30rem;border: 0.0625rem dashed #dadada;">
                <div class="text-white d-flex justify-content-center">
                    <h4 class="text-white">Compte Requis</h4>
                </div>
                <div class="text-white d-flex justify-content-center">
                    <p><a href="<?= URL ?>connexion" style="color:RGB(244, 117, 33);" class="text-decoration-none">Se connecter </a> ou <a href="<?= URL ?>inscription" style="color:RGB(244, 117, 33);" class="text-decoration-none">Créer un compte</a> pour commenter</p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="mt-5">
            <h4 class="text-white">Laisser un commentaire</h4>
            <form action="<?= URL ?>accueil/newComment" method="post" class="col-lg-6">
                <div class="form-group">
                    <textarea name="comment" class="form-control" id="exampleTextarea" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <input type="hidden" name="id_anime" value="<?= $id_anime ?>">
                    <button type="submit" name="submit" class="btn rounded-1" id="btn">commenter</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
    <div class="mb-5">
        <?php if (!empty($comments)) : ?>
            <h4 class='text-white mt-5'>Commentaires</h4>
            <?php foreach ($comments as $comment) : ?>
                <div class="toast show mt-5 mb-5" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img class='rounded-circle' width='50' src='<?= URL ?>asset/img/<?= $comment->getImg_profil() ?>'><strong class="me-auto ms-2"><?= $comment->getUsername() ?></strong>
                        <small><?= $comment->getDate() ?></small>
                    </div>
                    <div class="toast-body">
                        <?= $comment->getComment() ?>
                        <?php if (!empty($_SESSION['id'])) : ?>
                            <?php if ($_SESSION['id'] == $comment->getUser_id() || $_SESSION['roleUser'] === 'admin') : ?>
                                <div class="d-flex justify-content-end">
                                    <small>
                                        <form action="<?= URL ?>accueil/deleteComment" method="POST">
                                            <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                                            <input type="hidden" name="id_anime" value="<?= $id_anime ?>">
                                            <button type="submit" name="submit" class="btn btn-sm" style="color:RGB(244, 117, 33);">Supprimer</button>
                                        </form>
                                    </small>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>