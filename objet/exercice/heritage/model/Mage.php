<?php

class Mage extends Personnage{

    protected $magie;

    

    /**
     * Get the value of magie
     */ 
    public function getMagie()
    {
        return $this->magie;
    }

    /**
     * Set the value of magie
     *
     * @return  self
     */ 
    public function setMagie($magie)
    {
        $this->magie = $magie;

        return $this;
    }

    public function SeeCard():void{
        ?>
        <div class="card bg-danger" style="width: 18rem;">
            <img src="<?=$this->getImage()?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=htmlspecialchars($this->getNom())?></h5>
                <p class="card-text">
                    Niveau : <?=$this->getLvl()?> <br>
                    HP : <?=$this->getHp()?> <br>
                    MP : <?=$this->getMp()?> <br>
                    Type de mage : <?=$this->getMagie()?> <br>
                    Force : <?=$this->getForce()?>
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    Bio : <?=$this->getDescription()?>
                </li>
                <li class="list-group-item">Joueur depuis : <?=$this->getDateCreation()?></li>
            </ul>
            </div>
        <?php
    }

    public function Combat(Personnage $p){
        $retour = "<div class=\"alert alert-success\">LE ".strtoupper(__CLASS__)." LANCE LE COMBAT CONTRE LE NINJA</div>";
        $retour .= parent::Combat($p);

        return $retour;
    }
}