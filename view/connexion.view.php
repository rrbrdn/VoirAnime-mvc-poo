<?php ob_start() ?>

<div class="container text-white d-flex justify-content-center mt-5">
    <form action="connexion.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class='form-group'>
                <input type='email' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Enter email' name='email'>
            </div>
            <hr>
            <div class='form-group'>
                <input type='password' class='form-control rounded-3 bg-transparent text-white border-bottom-2' id='exampleInputPassword1' placeholder='Password' name='pdw'>
            </div>
            <hr>
            <div class="d-flex justify-content-center p-1 ">
                <button type="submit" id="btn" class="btn rounded-3 w-75" name='connect-btn'>Connexion</button>
            </div>
            <p>Pas de compte ? <a href="./inscription.php" style="color:RGB(244, 117, 33);">Créer un compte</a></p>
        </fieldset>
    </form>
</div>

<?php
$class = "navbar-center mx-auto";
$nav = "";
$content = ob_get_clean();
require_once "base.html.php";

?>