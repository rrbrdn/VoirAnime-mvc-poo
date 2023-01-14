<?php

require_once "modele/User.php";
require_once "modele/UserManager.php";

class UserController
{
    private $usermanager;

    public function __construct()
    {
        $this->usermanager = new UserManager;
        $this->usermanager->loadUsers();
    }

    public function displayUsers()
    {
        $users = $this->usermanager->getUsers();
        require_once "view/admin.view.php";
    }

    public function newUserValidation()
    {
        $this->usermanager->newUserDB($_POST['username'], $_POST['email'], $_POST['pdw']);
        header('Location:' . URL . "accueil");
    }

    public function connectUserValiation()
    {
        $this->usermanager->connectUserDB($_POST['email'], $_POST['pdw']);
        header('Location:' . URL . "accueil");    
    }

    public function disconnectUser()
    {
        $this->usermanager->deconnectUserDB();
        // header('Location:' . URL . "accueil");
    }
}
