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
    <?php endforeach ?>
</div>

<?php
$class = "container-fluid";
$nav = "<li class='nav-item'>
<a class='nav-link' href='" . URL . "connexion'>Connexion</a>
</li>
<li class='nav-item'>
<a class='nav-link' href='" . URL . "inscription'>Inscription</a>
</li>";
$content = ob_get_clean();
require_once "view/base.html.php";

?>