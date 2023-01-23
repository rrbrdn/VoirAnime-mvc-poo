<?php ob_start() ?>

<div class="container text-white d-flex justify-content-center mt-5 align-items-center" style="height: 70vh;">
    <form action="<?= URL ?>connexion/cvalid" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class='form-group'>
                <input type='email' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Email' name='email'>
            </div>
            <hr>
            <div class='form-group'>
                <input type='password' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputPassword1' placeholder='Mot de passe' name='pdw'>
            </div>
            <hr>
            <div class="d-flex justify-content-center p-1 ">
                <button type="submit" id="btn" class="btn rounded-3 w-75" name='connect-btn'>Connexion</button>
            </div>
            <small>
                Pas de compte ? <a href="<?= URL ?>inscription" style="color:RGB(244, 117, 33);" class="text-decoration-none">Créer un compte</a>
            </small>
        </fieldset>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>