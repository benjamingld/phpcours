<?php

namespace Model;

class Contact{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $demande;

    public function hydrate(array $donnees)
    {
    foreach ($donnees as $key => $value)
    {
        $method = 'set'.ucfirst($key);
    (method_exists($this,$method))?$this->$method($value):0;
    }
    }

    public function __construct(array $donnees)
    {
    $this->hydrate($donnees);
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
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of demande
     */ 
    public function getDemande()
    {
        return $this->demande;
    }

    /**
     * Set the value of demande
     *
     * @return  self
     */ 
    public function setDemande($demande)
    {
        $this->demande = $demande;

        return $this;
    }
}