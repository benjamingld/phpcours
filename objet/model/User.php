<?php

class User{

    private $_id;
    private $_civilite;
    private $_nom;
    private $_prenom;
    private $_naissance;
    private $_email;
    private $_password;
    private $_date_creation;
    private $_ip;

    public function __construct($id, $civilite, $nom, $prenom, $naissance, $email, $password, $date_creation, $ip){
        $this->_id = $id;
        $this->_civilite = $civilite;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_naissance = $naissance;
        $this->_email = $email;
        $this->_password = $password;
        $this->_date_creation = $date_creation;
        $this->_ip = $ip;

    }

//-------------------------------------------
            //GETTER ET SETTER
//-------------------------------------------

    public function get_id(){return $this->_id;}
    public function set_id($_id){
        $this->_id = $_id;
        return $this;
    }

    public function get_civilite(){return $this->_civilite ? "Homme":"Femme";}
    public function set_civilite($_civilite){
        $this->_civilite = $_civilite;
        return $this;
    }

    public function get_nom(){return htmlspecialchars($this->_nom);}
    public function set_nom($_nom){
        $this->_nom = $_nom;
        return $this;
    }

    public function get_prenom(){return $this->_prenom;}
    public function set_prenom($_prenom){
        $this->_prenom = $_prenom;
        return $this;
    }


    public function get_naissance(){return $this->_naissance;}
    public function set_naissance($_naissance){
        $this->_naissance = $_naissance;
        return $this;
    }

    public function get_email(){return $this->_email;}
    public function set_email($_email){
        $this->_email = $_email;
        return $this;
    }


    public function get_password(){return $this->_password;}
    public function set_password($_password){
        $this->_password = $_password;
        return $this;
    }

    public function get_date_creation(){return $this->_date_creation;}
    public function set_date_creation($_date_creation){
        $this->_date_creation = $_date_creation;
        return $this;
    }

    public function get_ip(){return $this->_ip;}
    public function set_ip($_ip){
        $this->_ip = $_ip;
        return $this;
    }

    //AFFICHAGE DES INFO DE L'UTILISATEUR
    private function informationUser(){
        echo $this->_id." ".$this->_nom." ".$this->_prenom ."<br>";
    }
    public function informationUtilisateur(){
        $this->informationUser();
        echo "Ma methode public";
    }

//-------------------------------------------
            //CUSTOM METHOD
//-------------------------------------------

    //METHODE QUI PERMET D'AFFICHER SOUS FORME D'UN TABLEAU HTML LES INFORMATIONS DE MON UTILISATEUR


    /**
     * PERMET D'AFFICHER LES DONNEES DE L'UTILISATEUR
     *
     * @param string $color
     * @return string
     */

    public function affichageTableau($color){
    ?>
        <table border=1 cellpadding="3" style="color:<?=$color?>">            
            <tr>
                <td><?="ID"?></td>
                <td><?="CIVILITE"?></td>
                <td><?="NOM"?></td>
                <td><?="PRENOM"?></td>
                <td><?="NAISSANCE"?></td>
                <td><?="EMAIL"?></td>
                <td><?="PASSWORD"?></td>
                <td><?="DATE CREATION"?></td>
                <td><?="IP"?></td>
            </tr>
            <tr>                   
                <td><?=$this->get_id()?></td>
                <td><?=$this->get_civilite()?></td>
                <td><?=$this->get_nom()?></td>
                <td><?=htmlspecialchars($this->get_prenom())?></td>
                <td><?=$this->get_naissance()?></td>
                <td><?=$this->get_email()?></td>
                <td><?=$this->get_password()?></td>
                <td><?=$this->get_date_creation()?></td>
                <td><?=$this->get_ip()?></td>
            </tr>
        </table>
    <?php
    }

    // public function affichageTableau1($color){

    //     $content = "<table border=1 cellpadding=3 style='color:{$color}'>"  ;          
    //         $content .= "<tr>";
    //             $content .="<td>ID</td>";
    //             $content .="<td>CIVILITE</td>";
    //             $content .="<td>NOM</td>";
    //             $content .="<td>PRENOM</td>";
    //             $content .="<td>NAISSANCE</td>";
    //             $content .="<td>EMAIL</td>";
    //             $content .="<td>PASSWORD</td>";
    //             $content .="<td>DATE CREATION</td>";
    //             $content .="<td>IP</td>";
    //         $content .=" </tr>";
    //         $content .="<tr>"          ;         
    //             $content .="<td>{$this->get_id()}</td>";
    //             $content .=" <td>{$this->get_civilite()}</td>";
    //             $content .="<td>{$this->get_nom()}</td>";
    //             $content .="<td>".htmlspecialchars($this->get_prenom())."</td>";
    //             $content .="<td>{$this->get_naissance()}</td>";
    //             $content .="<td>{$this->get_email()}</td>";
    //             $content .="<td>{$this->get_password()}</td>";
    //             $content .="<td>{$this->get_date_creation()}</td>";
    //             $content .="<td>{$this->get_ip()}</td>";
    //         $content .= "</tr>";
    //     $content .= "</table>";
    
    //     return $content;
    
    //     }

    }
