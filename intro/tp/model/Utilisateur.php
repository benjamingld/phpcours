<?php
namespace Model;

use \Model\trait\Clean;

class Utilisateur{
     use Clean;

    private $id;
    private $civilite;
    private $nom;
    private $prenom;
    private $naissance;
    private $email;
    private $password;
    private $date_creation;
    private $ip;

    const ADD_CLIENT_DOUBLON = 2;
    const ADD_CLIENT_OK = 1;
    const CONNECT_EMAIL_MISS = 3;
    const CONNECT_PASS_ERROR = 4;

    public function hydrate(array $data){
        foreach($data as $key=>$value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data){
        $this->hydrate($data);
    }


    //GETTER & SETTER
    public function getId(){return $this->id;}
    public function setId($id){
        $this->id = $id;
        return $this;
    }
 
    public function getCivilite(){return $this->civilite;} 
    public function setCivilite($civilite){
        $this->civilite = $civilite;
        return $this;
    }

    public function getNom(){return $this->nom;}
    public function setNom($nom){
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){
        $this->prenom = $prenom;
        return $this;
    }
 
    public function getNaissance(){return $this->naissance;}
    public function setNaissance($naissance){
        $this->naissance = $naissance;
        return $this;
    }

    public function getEmail(){return $this->email;}
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getPassword(){return $this->password;}
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getDate_creation(){return $this->date_creation;}
    public function setDate_creation($date_creation){
        $this->date_creation = $date_creation;
        return $this;
    }

    public function getIp(){return $this->ip;}
    public function setIp($ip){
        $this->ip = $ip;
        return $this;
    }
}