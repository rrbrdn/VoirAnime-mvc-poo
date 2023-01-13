<?php ob_start(); ?>

<div class="container my-5">

    <div class="card border-dark mb-3">

        <div class="card-header d-flex">
            <div class="p-2 flex-grow-1">
                Anime
            </div>
            <div class="p-2">
                <a href="<?= URL ?>admin/add"><button type="button" class="btn btn-outline-dark btn-sm">Ajouter</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row d-flex justify-content-between">
                <?php foreach ($animes as $anime) : ?>
                    <div class="card border-dark mb-3 m-3" style="max-width: 20rem;">
                        <div class="card-header"><?= $anime->getId() ?></div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $anime->getTitre() ?></h4>
                            <div class="d-flex justify-content-center">
                                <img src="./asset/img/<?= $anime->getImg() ?>" class="w-50">
                            </div>
                        </div>
                        <div class="p-3 d-flex justify-content-between">
                            <a href="<?= URL ?>admin/edit/<?= $anime->getId() ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="<?= URL ?>admin/delete/<?= $anime->getId() ?>" method="post" onSubmit="return confirm('êtes-vous certain ?')">
                                <button class="btn" type="submit"><i class="fa-solid fa-trash"></i><button>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        </div>

    </div>

</div>

<?php
$class = "container-fluid";
$nav = "<li class='nav-item'>
<a class='nav-link' href='./connexion.php'>deconexion</a>
</li>";
$content = ob_get_clean();
require_once "base.html.php";

?>