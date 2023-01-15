<?php

require_once "Favoris.php";
require_once "Manager.php";

class FavorisManager extends Manager {
    private $favoris;

    public function addFavoris($favoris) {
        $this->favoris[] = $favoris;
    }

    public function getFavoris() {
        return $this->favoris;
    }

    public function loadFavoris() {
        $req = $this->getBdd()->prepare("SELECT * FROM favoris");
        $req->execute();
        $myFavoris = $req->fetchAll();
        $req->closeCursor();

        foreach ($myFavoris as $favoris) {
            $f = new Favoris($favoris['id'], $favoris['id_user'], $favoris['id_anime']);
            $this->addFavoris($f);
        }
    }
}