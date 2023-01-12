<?php

abstract class Manager {
    private static $pdo;

    private static function setBdd(){
        self::$pdo = $bdd = new PDO('mysql:host=localhost;dbname=tp_crud', "root", "");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
    }

    protected function getBdd(){
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}