<?php

require_once "modele/Anime.php";
require_once "modele/AnimeManager.php";

class AnimeController {
    private $animeManager;

    public function __construct()
    {
        $this->animeManager = new AnimeManager;
        $this->animeManager->loadAnimes();
    }

    public function displayAnimes() {
        $animes = $this->animeManager->getAnimes();
        require_once "view/admin.view.php";
    }

    public function newAnimeForm(){
        require_once "view/new.anime.view.php";
    }

    public function newAnimeValidation(){
        $this->animeManager->newAnimeDB($_POST['titre'],$_POST['genre'],$_POST['descri'],$_POST['video']);
        header('Location:' . URL . "admin");
    }

    public function editAnimeForm($id){
        $anime = $this->animeManager->getAnimeById($id);
        require_once "view/edit.anime.view.php";
    }

    public function editAnimeValidation(){
        $this->animeManager->editAnimeDB($_POST['id-anime'],$_POST['titre'],$_POST['genre'],$_POST['descri'],$_POST['video']);
        header('Location:' . URL . "admin");
    }
}