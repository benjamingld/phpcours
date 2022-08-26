<?php
namespace Model\manager;

use PDO;
use PDOException;
use Model\Contact;
use Model\trait\Log;



class ContactManager{
    use Log;

    private $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
        return $this;
    }

    public function setDb($db){$this->db = $db;}

    /**
     * AJOUT D'UN CONTACT
     *
     * @param Contact $contact
     * @return boolean
     */
    public function add(Contact $contact):bool{
        try{
            $q = $this->db->prepare('INSERT INTO `contacte`( `nom`, `prenom`, `mail`, `demande`) VALUES (:nom,:prenom,:mail,:demande)');
            $q->execute([":nom"=>$contact->getNom(),":prenom"=>$contact->getPrenom(),":mail"=>$contact->getMail(),":demande"=>$contact->getDemande()]);
            return true;
        }catch(PDOException $e){
            echo "ERROR PDO ";
            $this->historisation(LOG_CONTACT, $e);
            return false;
        }
    }


}