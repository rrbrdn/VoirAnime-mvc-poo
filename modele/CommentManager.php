<?php

require_once "Manager.php";
require_once "Comment.php";

class CommentManager extends Manager
{
    private $comments;

    public function addComment($comment)
    {
        $this->comments[] = $comment;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function loadComments()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM comment");
        $req->execute();
        $myComments = $req->fetchAll();
        $req->closeCursor();

        foreach ($myComments as $comment) {
            $c = new Comment($comment['id'], $comment['comment'], $comment['user_id'], $comment['id_anime']);
            $this->addComment($c);
        }
    }
    
}
