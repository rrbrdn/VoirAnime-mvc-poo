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
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
        $id_user = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
        $id_anime = htmlspecialchars($_POST['id_anime'], ENT_QUOTES, 'UTF-8');

        $this->commentManager->newCommentDB($comment, $id_user, $id_anime);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function deleteCommentValidation()
    {
        $this->commentManager->deleteCommentDB($_POST['id']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
