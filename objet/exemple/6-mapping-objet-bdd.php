<?php

class Utilisateur{
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
            //PAR EXEMPLE setId, setNom, setPrenom
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data){

        $this->hydrate($data);
        // $this->id = $data['id'];
        // $this->nom = $data['nom'];
        // $this->prenom = $data['prenom'];
        // $this->mail = $data['mail'];
        // $this->ip = $data['ip'];
        // $this->date_creation = $data['date_creation'];
        // $this->activation = $data['activation'];

    }


    public function getActivation(){return $this->activation;}
    public function setActivation($activation){

        $activation = (int) $activation;
        (($activation >=0 && $activation <=2) ||  activation==9)  ?  $this->activation = $activation  :  0 ;
        return $this;
    }

    public function getDate_creation(){return $this->date_creation;}
    public function setDate_creation($date_creation){
        $this->date_creation = $date_creation;
        return $this;
    }

    public function getIp(){return $this->ip;}
    public function setIp($ip){
        (is_string($ip))  ?   $this->ip = trim($ip) : 0;
        return $this;
    }

    public function getMail(){return $this->mail;}
    public function setMail($mail){
        (filter_var($mail, FILTER_VALIDATE_EMAIL))  ?   $this->mail = strtolower(trim($mail))  :  0 ;
        return $this;
    }
 
    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){
        (is_string($prenom))   ?  $this->prenom = ucfirst(strtolower(trim($prenom)))   :   0 ;
        return $this;
    }

    public function getNom(){return $this->nom;}
    public function setNom($nom){
        (is_string($nom))   ?  $this->nom = ucfirst(strtolower(trim($nom)))   :   0 ;
        return $this;
    }

    public function getId(){return $this->id;}
    public function setId($id): Utilisateur 
    {
        $id = (int)$id;
        ($id > 0 )?  $this->id = $id :  0;
        return $this;
    }
}



$dsn = "mysql:host=localhost; dbname=bibliotheque2; charset=utf8; port=3306";
$user = "root";
//MAC ROOT
$pass = "";
$connexion = new PDO($dsn,$user,$pass);

$request = $connexion->query("SELECT * FROM utilisateur WHERE id=1");
$donnees = $request->fetch(PDO::FETCH_ASSOC);

$user= new Utilisateur($donnees);
var_dump($user);

echo $user->getNom();

//user
$request = $connexion->query("SELECT * FROM utilisateur");
$donnees = $request->fetchAll(PDO::FETCH_ASSOC);
$users = [];
foreach($donnees as $key=>$dataUser){
    $users[]= new Utilisateur($dataUser);
}

var_dump($users);
echo count($users);