<?php 

require_once "modele/CommentManager.php";
require_once "modele/Comment.php";

class CommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        if (!empty($_POST['id_anime'])) {
            $this->commentManager->loadComments($_POST['id_anime']);
        }
    }

    public function newCommentValidation()
    {
        $this->commentManager->newCommentDB($_POST['comment'], $_SESSION['id'], $_POST['id_anime']);
        header('Location:' . URL . "accueil/showAnime/" . $_POST['id_anime']);
    }

    public function deleteCommentValidation()
    {
        $this->commentManager->deleteCommentDB($_POST['id']);
        header('Location:' . URL . "accueil/showAnime/" . $_POST['id_anime']);
    }
} 
