<?php

require_once "modele/Anime.php";
require_once "modele/AnimeManager.php";

class AnimeController
{
    private $animeManager;

    public function __construct()
    {
        $this->animeManager = new AnimeManager;
        $this->animeManager->loadAnimes();
    }

    public function displayAnimes()
    {
        $animes = $this->animeManager->getAnimes();
        require_once "view/admin.view.php";
    }


    public function homeAnimeValidation(){
        $myAnimes = $this->animeManager->homeAnime();
        require_once "view/home.view.php";
    }


    public function showAnimeValidation($id)
    {
        $myAnimes = $this->animeManager->showAnime($id);
        require_once "view/show.anime.view.php";
    }

    public function newAnimeForm()
    {
        require_once "view/new.anime.view.php";
    }

    public function newAnimeValidation()
    {
        $this->animeManager->newAnimeDB($_POST['titre'], $_POST['genre'], $_POST['descri'], $_POST['video']);
        header('Location:' . URL . "admin");
    }

    public function editAnimeForm($id)
    {
        $anime = $this->animeManager->getAnimeById($id);
        require_once "view/edit.anime.view.php";
    }

    public function editAnimeValidation()
    {
        $this->animeManager->editAnimeDB($_POST['id-anime'], $_POST['titre'], $_POST['genre'], $_POST['descri'], $_POST['video']);
        header('Location:' . URL . "admin");
    }

    public function deleteAnime($id)
    {
        $this->animeManager->deleteAnimeDB($id);
        header("Location:" . URL . "admin");
    }
}
