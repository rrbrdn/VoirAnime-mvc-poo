<?php ob_start(); ?>

<div class="container my-5">

    <div class="card border-dark mb-3">

        <div class="card-header d-flex">
            <div class="p-2 flex-grow-1">
                Anime
            </div>
        </div>

        <form action="<?= URL ?>admin/avalid" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group p-3">
                    <label class="col-form-label mt-4" for="inputDefault">Titre</label>
                    <input type="text" class="form-control" placeholder="Ex: Dragon Ball..." name="titre">
                </div>
                <div class="form-group p-3">
                    <label class="col-form-label mt-4" for="inputDefault">Genre</label>
                    <input type="text" class="form-control" placeholder="Ex: Shonen..." name="genre">
                </div>
                <div class="form-group p-3">
                    <label for="exampleTextarea" class="form-label mt-4">Description</label>
                    <input type="text" class="form-control" name="descri">
                </div>
                <div class="form-group p-3">
                    <label class="col-form-label mt-4" for="inputDefault">Video</label>
                    <input type="text" class="form-control" name="video">
                </div>
                <div class="form-group p-3">
                    <label for="formFile" class="form-label mt-4">Selectionnez une image</label>
                    <input class="form-control" type="file" id="fileToUpload" name="img">
                </div>
                <hr>
                <div class="d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>