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

    public function loadComments($id)
    {
        $req = $this->getBdd()->prepare("SELECT * FROM user INNER JOIN comment ON user.id = comment.user_id WHERE id_anime = :id_anime ORDER BY comment.id DESC");
        $req->bindValue(':id_anime', $id , PDO::PARAM_INT);
        $req->execute();
        $myComments = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($myComments as $comment) {
            $c = new Comment($comment['id'], $comment['comment'], $comment['user_id'], $comment['id_anime'], $comment['username'], $comment['img_profil'], $comment['date']);
            $this->addComment($c);
        }
    }

    // public function getCommentById($id)
    // {
    //     foreach ($this->comments as $comment) {
    //         if ($comment->getIdComment() == $id) {
    //             return $comment;
    //         }
    //     }
    // }

    public function newCommentDB($comment, $user_id, $id_anime)
    {
        $date = date("Y-m-d H:i:s");  // obtenir la date actuelle
        $req = $this->getBdd()->prepare("INSERT INTO comment (comment, user_id, id_anime, date) VALUES (:comment, :user_id, :id_anime, :date)");
        $req->bindValue(':comment', $comment, PDO::PARAM_STR);
        $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $req->bindValue(':id_anime', $id_anime, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->execute();
        $req->closeCursor();
    }

    public function deleteCommentDB($id)
    {
        $req = $this->getBdd()->prepare("DELETE FROM comment WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}
