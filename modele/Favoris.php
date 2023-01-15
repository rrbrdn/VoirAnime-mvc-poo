<?php 

class Favoris {
    private int $id;
    private int $id_user;
    private int $id_anime;

    public function __construct($id,$id_user,$id_anime)
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->id_anime = $id_anime;
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
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

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
}