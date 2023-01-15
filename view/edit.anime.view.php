<?php ob_start(); ?>

<div class="container my-5">

    <div class="card border-dark mb-3">

        <div class="card-header d-flex">
            <div class="p-2 flex-grow-1">
                Edit de <?= $anime->getTitre() ?>
            </div>
        </div>

        <form action="<?= URL ?>admin/editvalid" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group p-3">
                    <input type="text" class="form-control" name="titre" value="<?= $anime->getTitre() ?>">
                </div>
                <div class="form-group p-3">
                    <input type="text" class="form-control" name="genre" value="<?= $anime->getGenre() ?>">
                </div>
                <div class="form-group p-3">
                    <input type="text" class="form-control" name="descri" value="<?= $anime->getDescri() ?>">
                </div>
                <div class="form-group p-3">
                    <input type="text" class="form-control" name="video" value="<?= $anime->getVideo() ?>">
                </div>
                <div class="form-group p-3">
                    <input class="form-control" type="file" name="img">
                </div>
                <input hidden type="text" name="animeID">
                <hr>
                <div class="d-flex justify-content-end p-3">
                    <input type="hidden" name="id-anime" value="<?= $anime->getId() ?>">
                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                </div>
            </fieldset>
        </form>
    </div>

</div>
<?php
$class = "container-fluid";
$content = ob_get_clean();
require_once "view/base.html.php";

?>