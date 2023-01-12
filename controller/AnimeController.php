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
}