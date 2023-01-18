<?php

abstract class Manager {

    private $pdo;

    private function setBdd(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=voiranime', "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    }

    protected function getBdd(){
        if ($this->pdo === null) {
            $this->setBdd();
        }
        return $this->pdo;
    }
}