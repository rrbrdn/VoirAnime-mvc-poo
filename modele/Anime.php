<?php

class Anime
{
    private int $id;
    private string $titre;
    private string $img;
    private string $genre;
    private string $descri;
    private string $video;

    public function __construct($id,$titre,$img,$genre,$descri,$video)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->img = $img;
        $this->genre = $genre;
        $this->descri = $descri;
        $this->video = $video;
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
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of descri
     */ 
    public function getDescri()
    {
        return $this->descri;
    }

    /**
     * Set the value of descri
     *
     * @return  self
     */ 
    public function setDescri($descri)
    {
        $this->descri = $descri;

        return $this;
    }

    /**
     * Get the value of video
     */ 
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @return  self
     */ 
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }
}
