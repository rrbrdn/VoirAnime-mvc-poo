<?php
require_once "Manager.php";

class AnimeManager extends Manager {
    private $animes;

    public function addAnime($anime) {
        $this->animes[] = $anime;
    }

    public function getAnimes() {
        return $this->animes;
    }

    public function loadAnimes(){
        $req = $this->getBdd()->prepare("SELECT * FROM anime");
        $req->execute();
        $myAnimes = $req->fetchAll();
        $req->closeCursor();

        foreach ($myAnimes as $anime) {
            $a = new Anime($anime['id'], $anime['titre'], $anime['img'], $anime['genre'], $anime['descri'], $anime['video']);
            $this->addAnime($a);
        }
    }
}