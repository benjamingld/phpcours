<?php

abstract class Personnage implements Iterator{

    //utilisation du trait
    use Clean;

    protected $id;
    protected $nom;
    protected $hp;
    protected $mp;
    protected $lvl;
    protected $force;
    protected $image;
    protected $dateCreation;
    protected $activation;
    protected $ip;
    protected $description;
    protected $position = 0;
    protected $tab = [SELF::S_FRANCE, self::S_RUSSE, self::S_CHINOIS, self::S_AMERICAIN];

    const S_FRANCE = "Serveur France";
    const S_RUSSE = "Serveur Russe";
    const S_CHINOIS = "Server Chinois";
    const S_AMERICAIN = "Serveur Américain";

    #[\ReturnTypeWillChange] // equivalent à :mixed comme la fonction key().   
    public function current(){
        return $this->tab[$this->position];
    }

    public function key():mixed{
        return $this->position;
    }

    public function rewind():void{
        $this->postion = 0;
    }

    public function next():void{
        $this->position++;
    }

    public function valid():bool{
        return isset($this->tab[$this->position]);
    }


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
        echo "CONSTRUCTEUR".__CLASS__."<br>";
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
    protected function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
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
        $this->activation = $activation;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of force
     */ 
    public function getForce()
    {
        return $this->force;
    }

    /**
     * Set the value of force
     *
     * @return  self
     */ 
    public function setForce($force)
    {
        $this->force = $force;

        return $this;
    }

    /**
     * Get the value of lvl
     */ 
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Set the value of lvl
     *
     * @return  self
     */ 
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get the value of mp
     */ 
    public function getMp()
    {
        return $this->mp;
    }

    /**
     * Set the value of mp
     *
     * @return  self
     */ 
    public function setMp($mp)
    {
        $this->mp = $mp;

        return $this;
    }

    /**
     * Get the value of hp
     */ 
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

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

    //CELA M'OBLIGE A CREER LA METHODE SEECARD DANS CHAQUE ENFANT
    abstract public function SeeCard();


    public function Combat(Personnage $p){
        $retour = "";
        while($p->getHp()>=0 && $this->getHp()>=0){
            $p->setHp($p->getHp()-$this->force);
            $retour .= $this->getNom()." attaque ".$p->getNom().' il lui reste '.$p->getHp().' pv<br>';
            $this->hp = $this->getHp()-$p->getForce();
            $retour .= $p->getNom()." attaque ".$this->getNom().' il lui reste '.$this->getHp().' pv<br>';
        }
        if($p->getHp()>=0){
            $retour .= "<strong>".$this->getNom()." a perdu le combat</strong>";
        } else {
            $retour .= "<strong>".$p->getNom()." a perdu le combat</strong>";
        }
        return $retour;
    }



    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}