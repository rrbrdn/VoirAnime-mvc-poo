<?php

require_once "controller/AnimeController.php";
$animeController = new AnimeController;

if (empty($_GET['page'])) {
    require_once "view/home.view.php";
}else {
    switch ($_GET['page']) {
        case 'accueil': require_once "view/home.view.php";
            break;
        case 'connexion': require_once "view/connexion.view.php";
            break;
        case 'inscription': require_once "view/inscription.view.php";
            break;
        case 'admin': require_once "view/admin.view.php";
            break;
    }
}
