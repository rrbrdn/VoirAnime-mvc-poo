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

    public function showComment()
    {
       $comments = $this->commentManager->showComments();
    }

    public function newCommentDB($comment, $user_id, $id_anime)
    {
        $this->commentManager->newCommentDB($comment, $user_id, $id_anime);
    }

    public function deleteCommentDB($id)
    {
        $this->commentManager->deleteCommentDB($id);
    }
} 