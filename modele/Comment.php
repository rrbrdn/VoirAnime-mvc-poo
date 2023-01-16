<?php

class Comment
{
    private int $id;
    private string $comment;
    private int $user_id;
    private int $id_anime;
    private string $username;
    private string $img_profil;
    private string $date;

    public function __construct($id, $comment, $user_id, $id_anime,$username,$img_profil,$date)
    {
        $this->id = $id;
        $this->comment = $comment;
        $this->user_id = $user_id;
        $this->id_anime = $id_anime;
        $this->username = $username;
        $this->img_profil = $img_profil;
        $this->date = $date;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of comment
     */ 
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */ 
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of id_anime
     */ 
    public function getId_anime()
    {
        return $this->id_anime;
    }

    /**
     * Set the value of id_anime
     *
     * @return  self
     */ 
    public function setId_anime($id_anime)
    {
        $this->id_anime = $id_anime;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of img_profil
     */ 
    public function getImg_profil()
    {
        return $this->img_profil;
    }

    /**
     * Set the value of img_profil
     *
     * @return  self
     */ 
    public function setImg_profil($img_profil)
    {
        $this->img_profil = $img_profil;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
