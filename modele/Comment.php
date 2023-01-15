<?php

class Comment
{
    private int $id;
    private string $comment;
    private int $user_id;
    private int $id_anime;

    public function __construct(int $id, string $comment, int $user_id, int $id_anime)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->user_id = $user_id;
        $this->id_anime = $id_anime;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getIdAnime()
    {
        return $this->id_anime;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function setIdAnime(int $id_anime)
    {
        $this->id_anime = $id_anime;
    }
}
