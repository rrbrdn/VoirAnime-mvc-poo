<?php ob_start() ?>



<div class="wrapper">

    <h2><strong>All Animes</strong></h2>

    <div class="cards">
        <?php foreach ($myAnimes as $anime) : ?>
            <a href="<?= URL ?>accueil/showAnime/<?= $anime['id'] ?>">
                <figure class="card">
                    <img src="./asset/img/<?= $anime['img'] ?>" />
                </figure>
            </a>
        <?php endforeach; ?>
    </div>
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