<?php

class Personnage{

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


    public function SeeCard():void{
        ?>
        <div class="card" style="width: 18rem;">
            <img src="<?=$this->getImage()?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=htmlspecialchars($this->getNom())?></h5>
                <p class="card-text">
                    Niveau : <?=$this->getLvl()?> <br>
                    HP : <?=$this->getHp()?> <br>
                    MP : <?=$this->getMp()?> <br>
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Classe : <?=$this->getClassePerso()?></li>
                <li class="list-group-item">Force : <?=$this->getForce()?></li>
                <li class="list-group-item">Joueur depuis : <?=$this->getDateCreation()?></li>
            </ul>
            </div>
        <?php
    }


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
}