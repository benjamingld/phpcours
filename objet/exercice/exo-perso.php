<?php

class Perso {
    private $_id;
    private $_nom;
    private $_hp;
    private $_lvl;
    private $_force;
    private $_classe;
    private $_mp;
    private $_ip;
    private $_date_creation;
    private $_activation;
    private $_image;

    public function __construct($id,$nom,$hp,$lvl,$force,$classe,$mp,$ip,$date_creation,$activation,$image){
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_hp = $hp;
        $this->_lvl = $lvl;
        $this->_force = $force;
        $this->_classe = $classe;
        $this->_mp = $mp;
        $this->_ip = $ip;
        $this->_date_creation = $date_creation;
        $this->_activation = $activation;
        $this->_image = $image;
    }

   
    public function get_id(){
        return $this->_id;
    }

    public function set_id($_id){
        $this->_id = $_id;
        return $this;
    }
    public function get_nom(){
        return $this->_nom;
    }

    public function set_nom($_nom){
        $this->_nom = $_nom;
        return $this;
    }


    public function get_hp(){
        return $this->_hp;
    }


    public function set_hp($_hp){
        $this->_hp = $_hp;
        return $this;
    }

    public function get_lvl(){
        return $this->_lvl;
    }


    public function set_lvl($_lvl){
        $this->_lvl = $_lvl;
        return $this;
    }

    public function get_force(){
        return $this->_force;
    }

    public function set_force($_force){
        $this->_force = $_force;
        return $this;
    }

    public function get_classe(){
        return $this->_classe;
    }

    public function set_classe($_classe){
        $this->_classe = $_classe;
        return $this;
    }


    public function get_mp()
    {
        return $this->_mp;
    }

    public function set_mp($_mp){
        $this->_mp = $_mp;

        return $this;
    }

    public function get_ip(){
        return $this->_ip;
    }

    public function set_ip($_ip){
        $this->_ip = $_ip;
        return $this;
    }

    public function get_date_creation(){
        return $this->_date_creation;
    }

    public function set_date_creation($_date_creation){
        $this->_date_creation = $_date_creation;
        return $this;
    }

    public function get_activation(){
        return $this->_activation;
    }

    public function set_activation($_activation){
        $this->_activation = $_activation;

        return $this;
    }

    public function get_image(){
        return $this->_image;
    }


    public function set_image($_image){
        $this->_image = $_image;
        return $this;
    }



    public function Combat($victime){
        while($victime->get_hp() > 0 && $this->get_hp() > 0){
            
                $victime->set_hp($victime->get_hp()-$this->get_force());
                echo "{$this->get_nom()} attaque {$victime->get_nom()}, "."Il reste {$victime->get_hp()} point de vie à {$victime->get_nom()}<br/><br/>";
                $this->set_hp($this->get_hp()-$victime->get_force());
                echo "{$victime->get_nom()} attaque {$this->get_nom()}, "."Il reste {$this->get_hp()} point de vie à {$this->get_nom()}<br/><br/>";

        }
        if($this->get_hp() <= 0){
            echo "<h1>Vainqueur : {$victime->get_nom()}</h1><br/>";
        }else{
            echo "<h1>Vainqueur : {$this->get_nom()}</h1><br/>";
        }

        echo "Fin du combat";
    }
    
    
    public function cartePerso(){
        echo "<div>";
        echo "<img src='{$this->get_image()}'style='width:200'>";
        echo "<ul>";
        echo "<h3>{$this->get_nom()}</h3>";
        echo "<li>Classe : {$this->get_classe()}</li>";
        echo "<li>Level : {$this->get_lvl()}</li>";
        echo "<li>HP : {$this->get_hp()}</li>";
        echo "<li>Mana : {$this->get_mp()}</li>";
        echo "<li>Force : {$this->get_force()}</li>";
        echo "</ul>";
        echo "</div>";
    }
}


$assassin = new Perso(1,"Jin-Kazama",150,40,60,"Assassin",100,"132.132.132.132",2020-12-05,1,"https://dailygeekshow.com/wp-content/uploads/sites/2/2015/12/Jin-Kazama-2.jpg");


$archer = new Perso(2,"Barde",120,20,60,"Archer",150,"125.125.125.125",2019-10-12,1,"https://www.shoshosein.com/sites/default/files/personnages/final-fantasy/ffxiv/final_fantasy_xiv_archer.jpg");


$personnages = [$assassin,$archer];

foreach($personnages as $perso){
    echo $perso->cartePerso();
}


$archer->Combat($assassin);

