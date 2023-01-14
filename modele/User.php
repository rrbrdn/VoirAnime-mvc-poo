<?php 

class User {
    private int $id;
    private string $roleUser;
    private string $username;
    private string $email;
    private string $pdw;
    private string $img_profil;

    public function __construct($id,$roleUser,$username,$email,$pdw,$img_profil)
    {
        $this->id = $id;
        $this->roleUser = $roleUser;
        $this->username = $username;
        $this->email = $email;
        $this->pdw = $pdw;
        $this->img_profil = $img_profil;
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
     * Get the value of roleUser
     */ 
    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * Set the value of roleUser
     *
     * @return  self
     */ 
    public function setRoleUser($roleUser)
    {
        $this->roleUser = $roleUser;

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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pdw
     */ 
    public function getPdw()
    {
        return $this->pdw;
    }

    /**
     * Set the value of pdw
     *
     * @return  self
     */ 
    public function setPdw($pdw)
    {
        $this->pdw = $pdw;

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
}