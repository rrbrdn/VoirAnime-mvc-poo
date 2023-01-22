<?php ob_start() ?>

<div class="container text-white d-flex justify-content-center mt-5">
    <form action="<?=URL?>inscription/uvalid" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="form-group p-1">
                <input type="text" class="form-control rounded-3 bg-transparent text-white border-bottom-2" name="username" placeholder="Nom d'utilisateur" autocomplete="off">
            </div>
            <hr>
            <div class="form-group p-1">
                <input type="email" class="form-control rounded-3 bg-transparent text-white border-bottom-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" autocomplete="off">
            </div>
            <hr>
            <div class="form-group p-1">
                <input type="password" class="form-control rounded-3 bg-transparent text-white border-bottom-2" id="exampleInputPassword1" placeholder="Mot de passe" name="pdw" autocomplete="off">
            </div>
            <hr>
            <div class="form-group p-1">
                <input class="form-control rounded-3 bg-transparent text-white border-bottom-2" type="file" id="fileToUpload" name="img">
                <small class="form-text text-muted">Selectionnez une image de profil</small>
            </div>
            <hr>
            <div class="d-flex justify-content-center p-1 ">
                <button type="submit" id="btn" class="btn rounded-3 w-75" name="submit">Crée un compte</button>
            </div>
            <p>Vous avez déjà un compte ? <a href="<?=URL?>connexion" style="color:RGB(244, 117, 33);" class="text-decoration-none">Se connecter</a></p>
        </fieldset>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>