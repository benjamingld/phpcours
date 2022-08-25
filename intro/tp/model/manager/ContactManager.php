<?php
namespace Model\manager;
use \PDO;
use PDOException;
use Model\Contact;


class ContactManager{
    use \Model\trait\Log;

    private $db;

    public function __construct(PDO $db){
        
        $this->setDb($db);
        return $this;
    }

    public function setDb($db){
        $this->db = $db;
        return $this;
    }

/**
 * Undocumented function
 *
 * @param Contact $contact
 * @return void
 */
    public function add(Contact $contact){

        try{
        $request = $this->db->prepare("INSERT INTO contact(nom,prenom,mail,demande,date_creation) 
        VALUES (:nom, :prenom, :mail, :demande, now())");
        $request->execute([
            ":nom"=>$contact->getNom(),
            ":prenom"=>$contact->getPrenom(),
            ":mail"=>$contact->getMail(),
            ":demande"=>$contact->getDemande()]);
            return true;
        }catch(PDOException $e){
            $this->historisation(LOG_CONTACT, $e);
            $erreur = "Une erreur est survenue contacter l'administrateur ".ADMIN_MAIL;
            return false;
        }

    }
}
