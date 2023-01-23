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
        require_once "view/profil.view.php";
    }

    public function displayUser()
    {
        $user = $this->usermanager->profil();
        require_once "view/profil.view.php";
    }

    public function editMailValidation()
    {
        $this->usermanager->editMail($_POST['email']);
        header('Location:' . URL . "profil");
    }

    public function editPdwValidation()
    {
        $this->usermanager->editPdw($_POST['pdw']);
        header('Location:' . URL . "profil");
    }

    public function newUserValidation()
    {
        $this->usermanager->newUserDB($_POST['username'], $_POST['email'], $_POST['pdw']);
        header('Location:' . URL . "connexion");
    }

    public function connectUserValiation()
    {
        $this->usermanager->connectUserDB($_POST['email'], $_POST['pdw']);
        header('Location:' . URL . 'accueil');    
    }

    public function disconnectUser()
    {
        $this->usermanager->deconnectUserDB();
    }
}
