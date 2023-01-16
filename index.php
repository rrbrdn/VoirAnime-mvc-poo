<?php

session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));

require_once "controller/AnimeController.php";
$animeController = new AnimeController;
require_once "controller/UserController.php";
$userController = new UserController;
require_once "controller/FavorisController.php";
$favorisController = new FavorisController;
require_once "controller/CommentController.php";
$commentController = new CommentController;

if (empty($_GET['page'])) {
    $animeController->homeAnimeValidation();
} else {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    switch ($url[0]) {
        case 'accueil':
            if (empty($url[1])) {
                $animeController->homeAnimeValidation();
            } elseif ($url[1] === "showAnime") {
                $animeController->showAnimeValidation($url[2]);
            } elseif ($url[1] === "newComment") {
                $commentController->newCommentValidation();
            } elseif ($url[1] === "deleteComment") {
                $commentController->deleteCommentValidation();
            }
            break;
        case 'connexion':
            if (empty($url[1])) {
                require_once "view/connexion.view.php";
            } elseif ($url[1] === "cvalid") {
                $userController->connectUserValiation();
            }
            break;
        case 'deconnexion':
            if (empty($url[1])) {
                $userController->disconnectUser();
            }
            break;
        case 'inscription':
            if (empty($url[1])) {
                require_once "view/inscription.view.php";
            } elseif ($url[1] === "uvalid") {
                $userController->newUserValidation();
            }
            break;
        case 'profil':
            if (empty($url[1])) {
                $userController->displayUser();
            } elseif ($url[1] === "editmail") {
                $userController->editMailValidation();
            } elseif ($url[1] === "editpdw") {
                $userController->editPdwValidation();
            }
            break;
        case 'ma-collection':
            if (empty($url[2])) {
                $favorisController->userFavorites();
            } elseif ($url[1] === "add") {
                $favorisController->newFavoris($url[2]);
            } elseif ($url[1] === "delete") {
                $favorisController->deleteFavoris($url[2]);
            }
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
                $animeController->deleteAnime($url[2]);
            }
            break;
    }
}
