<?php ob_start(); ?>

<div class="wrapper">
    <h2><strong>Ma collection</strong></h2>
    <div class="container">
        <div class="cards">
            <?php foreach ($favoris as $fav) : ?>
                <a href="<?= URL ?>accueil/showAnime/<?= $fav[0] ?>">
                    <figure class="card">
                        <input hidden type="text" name="titre" value="<?= $fav['titre'] ?>">
                        <img src="./../asset/img/<?= $fav['img'] ?>" />
                    </figure>
                </a>

                <form action="<?= URL ?>ma-collection/delete/<?= $fav['id'] ?>" method="post" onSubmit="return confirm('êtes-vous certain ?')">
                    <button class="btn text-light" type="submit">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>