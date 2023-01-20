<?php
require_once "Manager.php";

class FavorisManager extends Manager
{
    private $favoris;

    public function addFavoris($favori)
    {
        $this->favoris[] = $favori;
    }

    public function getFavoris()
    {
        return $this->favoris;
    }

    public function loadFavoris()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM favoris");
        $req->execute();
        $myFavoris = $req->fetchAll();
        $req->closeCursor();

        foreach ($myFavoris as $favoris) {
            $f = new Favoris($favoris['id'], $favoris['id_user'], $favoris['id_anime']);
            $this->addFavoris($f);
        }
    }

    public function getFavorisId($id){
        foreach ($this->favoris as $favori) {
            if ($favori->getId() == $id) {
                return $favori;
            }
        }
    }

    public function userFavoris()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM anime INNER JOIN favoris ON anime.id = favoris.id_anime WHERE favoris.id_user = :id_user");
        $req->bindValue(":id_user", $_SESSION['id'], PDO::PARAM_INT);
        $req->execute();
        $myFavoris = $req->fetchAll();
        $req->closeCursor();

        return $myFavoris;
    }

    public function newFavorisDB($id_anime)
    {
        $id_user = $_SESSION['id'];

        $req = ("INSERT INTO favoris (id_user, id_anime) VALUES (:id_user, :id_anime)");
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id_user", $id_user, PDO::PARAM_INT);
        $stmt->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $favoris = new Favoris($this->getBdd()->lastInsertId(), $id_user, $id_anime);
            $this->addFavoris($favoris);
        }
        
    }

    public function deleteFavorisDB($id)
    {
        $req = ("DELETE FROM favoris WHERE id = :id");
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if ($result) {
            $favoris = $this->getFavorisId($id);
            unset($favoris);
        }
    }
}
