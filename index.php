<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controller/AnimeController.php";
$animeController = new AnimeController;

if (empty($_GET['page'])) {
    require_once "view/home.view.php";
} else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    switch ($url[0]) {
        case 'accueil':
            require_once "view/home.view.php";
            break;
        case 'connexion':
            require_once "view/connexion.view.php";
            break;
        case 'inscription':
            require_once "view/inscription.view.php";
            break;
        case 'admin':
            if (empty($url[1])) {
                $animeController->displayAnimes();
            } elseif ($url[1] === "add") {
                $animeController->newAnimeForm();
            } elseif ($url[1] === "avalid") {
                $animeController->newAnimeValidation();
            } elseif ($url[1] === "edit") {
                $animeController->editAnimeForm($url[2]);
            } elseif ($url[1] === "editvalid") {
                $animeController->editAnimeValidation();
            } elseif ($url[1] === "delete") {
                echo "supprimer un jeu";
            }
            break;
    }
}
