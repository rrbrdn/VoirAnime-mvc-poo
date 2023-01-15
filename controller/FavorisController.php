<?php

require_once "modele/Favoris.php";
require_once "modele/FavorisManager.php";

class FavorisController
{
    private $favorisManager;

    public function __construct()
    {
        $this->favorisManager = new FavorisManager;
        $this->favorisManager->loadFavoris();
    }

    public function displayFavoris()
    {
        $favoris = $this->favorisManager->getFavoris();
        require_once "view/favoris.view.php";
    }

    public function userFavorites()
    {
        $favoris = $this->favorisManager->userFavoris();
        require_once "view/collection.view.php";
    }

    public function newFavoris($id_anime)
    {
        $this->favorisManager->newFavorisDB($id_anime);
        header("Location: " . URL . "ma-collection/"."$_SESSION[id]");
    }

    public function deleteFavoris($id)
    {
        $this->favorisManager->deleteFavorisDB($id);
        header("Location: " . URL . "ma-collection/"."$_SESSION[id]");
    }
}
