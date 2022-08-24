<?php

class Ninja extends Personnage{
    
    protected $rang;
    /**
     * Get the value of classePerso
     */ 
    public function getRang()
    {
        return $this->rang;
    }

    /**
     * Set the value of classePerso
     *
     * @return  self
     */ 
    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }

    public function SeeCard():void{
        ?>
        <div class="card bg-success" style="width: 18rem;">
            <img src="<?=$this->getImage()?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=htmlspecialchars($this->getNom())?></h5>
                <p class="card-text">
                    Niveau : <?=$this->getLvl()?> <br>
                    HP : <?=$this->getHp()?> <br>
                    MP : <?=$this->getMp()?> <br>
                    Rang ninja : <?=$this->getRang()?> <br>
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
        $retour = "<div class=\"alert alert-warning\">LE ".strtoupper(__CLASS__)." LANCE LE COMBAT CONTRE LE MAGE</div>";
        $retour .= parent::Combat($p);

        return $retour;
    }


}