<?php ob_start() ?>


<div class="wrapper">
    <h2><strong>Mon profil</strong></h2>
</div>


<div class="container mt-5" id="coucou">
    <div class="d-flex">
        <img src="<?=URL?>asset/img/<?= $user['img_profil'] ?>" width="150" class="rounded-circle border border-2">
        <div class="d-flex align-items-center ms-3">
            <h4 class="text-white"><?= $user['username'] ?></h4>
        </div>
    </div>

    <style>
        #coucou {
            background-color: RGB(35, 37, 43);
            color: RGB(244, 117, 33);
        }
    </style>
    <div class="mt-5" id="coucou">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#email" aria-selected="true" role="tab">Changer l'adresse e-mail</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#mdp" aria-selected="false" role="tab" tabindex="-1">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#supprimer" aria-selected="false" role="tab" tabindex="-1">Supprimer mon profil</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show" id="email" role="tabpanel">
                <div class="m-3">
                    <small class="text-white">Adresse e-mail actuelle</small>
                    <p><?= $user['email'] ?></p>
                </div>
                <form action="<?=URL?>editmail" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group p-3">
                            <input type="text" class="form-control bg-transparent border border-2 w-25" name="email">
                        </div>
                        <input hidden type="text" name="idUser" value="<?= $user['id'] ?>">
                        <hr>
                        <div class="d-flex justify-content-end p-3">
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="tab-pane fade" id="mdp" role="tabpanel">
                <p>mdp</p>
            </div>
            <div class="tab-pane fade" id="supprimer" role="tabpanel">
                <form action='./../src/component/delete-compte.php' method='post'>
                    <input hidden name='idUser' value="<?= $user['id'] ?>">
                    <button class='btn' type='submit'>Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>




<?php

var_dump($user);
$content = ob_get_clean();

require_once "view/base.html.php";
?>