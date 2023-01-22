<?php ob_start(); ?>


<div class="wrapper">
    <h2 class="text-white"><strong>Admin</strong></h2>
</div>
<div class="container mt-5 d-flex justify-content-center">
    <table class="table table-hover text-center shadow w-75">
        <thead class="table-dark">
            <tr>
                <th>Titre</th>
                <th>Id</th>
                <th colspan="2">Actions</th>
                <th>Voir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animes as $anime) : ?>
                <tr>
                    <td><?= $anime->getTitre() ?></td>
                    <td><?= $anime->getId() ?></td>
                    <td><a href="<?= URL ?>admin/edit/<?= $anime->getId() ?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td>
                        <form method="POST" action="<?= URL ?>admin/delete/<?= $anime->getId() ?>" onSubmit="return confirm('Etes-vous certains de vouloir supprimer ce jeu ?')">
                            <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                    <td><a href="<?= URL ?>accueil/showAnime/<?= $anime->getId() ?>" class="btn"><i class="fa-solid fa-eye"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
require_once "component/base.html.php";
?>