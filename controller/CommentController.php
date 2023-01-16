<?php 

require_once "modele/CommentManager.php";
require_once "modele/Comment.php";

class CommentController
{
    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
        $this->commentManager->loadComments();
    }

    public function showCommentValidation()
    {
        $comments = $this->commentManager->getComments();
        var_dump($comments);
    }
} 