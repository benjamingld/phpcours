<?php

class Utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $ip;
    private $date_creation;
    private $activation;

    private function hydrate(array $data){
        foreach($data as $key=>$value){
            $method = 'set'.ucfirst($key);
            //PAR EXEMPLE setID setNom setPrenom
            if(method_exists($this,$method)){
                $this->$method($value);
            }

        }
    }

    public function __construct(array $data)
    {
        $this->hydrate($data);
        // $this->id = $data['id'];
        // $this->nom = $data['nom'];
        // $this->prenom = $data['prenom'];
        // $this->mail = $data['mail'];
        // $this->ip = $data['ip'];
        // $this->date_creation = $data['date_creation'];
        // $this->activation = $data['activation'];
    }

    /**
     * Get the value of activation
     */ 
    public function getActivation()
    {
        return $this->activation;
    }

    /**
     * Set the value of activation
     *
     * @return  self
     */ 
    public function setActivation($activation)
    {
        $activation = (int) $activation;
        (($activation >= 0 && $activation <= 2) || $activation==9)?$this->activation = $activation:0;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDate_creation($dateCreation)
    {
        $this->date_creation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of ip
     */ 
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set the value of ip
     *
     * @return  self
     */ 
    public function setIp($ip)
    {
        (is_string($ip))?$this->ip =  trim($ip):0;

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
        (filter_var($mail, FILTER_VALIDATE_EMAIL))?$this->mail = strtolower(trim($mail)):0;

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
        (is_string($prenom))?$this->prenom = ucfirst(strtolower(trim($prenom))):0 ;
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
        (is_string($nom))?$this->nom = ucfirst(strtolower(trim($nom))):0 ;
        return $this;
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
    public function setId($id):Utilisateur
    {
        $id = (int)$id;
        ($id > 0)?$this->id = $id:0;

        return $this;
    }
}

class UtilisateurManager {
    private $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
        return $this;
    }

    public function get($info){
        if(is_int($info)){
            $request = $this->db->query("SELECT * FROM utilisateur WHERE id = ".$info);
        }else{
            $request = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $request->execute(["mail"=>$info]);
        }       
        $data = $request->fetch(PDO::FETCH_ASSOC);
        return ($data) ? new Utilisateur($data):0;
    }

    public function setDb($db){$this->db = $db;}
}


$connexion = new PDO("mysql:host=localhost;dbname=bibliotheque2;charset=utf8;port=3306","root","");
$utilisateurManager = new UtilisateurManager($connexion);
var_dump($utilisateurManager);

$user1 = $utilisateurManager->get(1);
$user2 = $utilisateurManager->get("p.louis@test.fr");
$user2 = $utilisateurManager->get("pjnlbhj.louis@test.fr");

var_dump($user1,$user2,$user3);

if($user3){
    echo "Affichage des données";
}else{
    echo "User inexistant";
}
