<?php

require_once "Manager.php";
require_once "Comment.php";

class CommentManager extends Manager {
    private $comments;

    public function addComment($comment) {
        $this->comments[] = $comment;
    }

    public function getComments() {
        return $this->comments;
    }

    public function loadComments() {
        $req = $this->getBdd()->prepare("SELECT * FROM comment");
        $req->execute();
        $myComments = $req->fetchAll();
        $req->closeCursor();

        foreach ($myComments as $comment) {
            $c = new Comment($comment['id'], $comment['comment'], $comment['user_id'], $comment['id_anime']);
            $this->addComment($c);
        }
    }

    public function showComments() {
        $req = ("SELECT * FROM comment");
        $statement = $this->getBdd()->prepare($req);
        $statement->execute();
        $myComments = $statement->fetchAll();
        $statement->closeCursor();

        return $myComments;
    }

    public function newCommentDB($comment, $user_id, $id_anime) {
        // check if submitted with post
        if (!empty($_POST['comment']) && !empty($_POST['user_id']) && !empty($_POST['id_anime'])) {
            // $reg = "/^[a-zA-Z0-9_ -]{3,50}$/";
            // if (preg_match($reg, $_POST['titre'])) {

            $req = $this->getBdd()->prepare("INSERT INTO comment (comment, user_id, id_anime) VALUES (:comment, :user_id, :id_anime)");
            $req->bindValue(":comment", $comment, PDO::PARAM_STR);
            $req->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $req->bindValue(":id_anime", $id_anime, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
        }
    }

    public function deleteCommentDB($id) {
        $req = $this->getBdd()->prepare("DELETE FROM comment WHERE id = :id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }
}