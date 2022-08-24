<?php

class ContactManager{

    private $db;

    public function __construct(PDO $db){
        
        $this->setDb($db);
        return $this;
    }

    public function setDb($db){
        $this->db = $db;
        return $this;
    }

    public function add(Contact $contact){

        $request = $this->db->prepare("INSERT INTO contact(nom,prenom,mail,demande,date_creation) 
        VALUES (:nom, :prenom, :mail, :demande, now())");
        $request->execute([
            ":nom"=>$contact->getNom(),
            ":prenom"=>$contact->getPrenom(),
            ":mail"=>$contact->getMail(),
            ":demande"=>$contact->getDemande()]);
    }
}