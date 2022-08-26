<?php
namespace Model\manager;

use PDO;
use PDOException;
use Model\Utilisateur;
use Model\trait\Log;



class UtilisateurManager{
    use Log;

    private $db;

    const OPTION_CRYPT = 12;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
        return $this;
    }

    public function setDb($db){$this->db = $db;}

    /**
     * AJOUT D'UN utilisateur
     *
     * @param UTILISATEUR $utilisateur
     * @return boolean
     */
    public function add(Utilisateur $utilisateur){
        try{
            $q = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $q->execute([':email'=>$utilisateur->getEmail()]);
            if($q->fetch(PDO::FETCH_ASSOC)){
                return Utilisateur::ADD_CLIENT_DOUBLON;
            } else {
                
                    $options = ['cost'=>self::OPTION_CRYPT];
                    $q = $this->db->prepare("INSERT INTO utilisateur(civilite,nom,prenom,naissance,email,password,ip) VALUES(:civilite,:nom,:prenom,:naissance,:email,:password,:ip)");
                    $q->execute([
                                'civilite'=>$utilisateur->getCivilite(),
                                'nom' => $utilisateur->getNom(),
                                'prenom' => $utilisateur->getPrenom(),
                                'naissance' => $utilisateur->getNaissance(),
                                'email' => $utilisateur->getEmail(),
                                'password' => password_hash($utilisateur->getPassword(), PASSWORD_BCRYPT, $options),
                                'ip' => $_SERVER['REMOTE_ADDR']
                                ]);
                    return Utilisateur::ADD_CLIENT_OK;
                
            }
        }catch(PDOException $e){
            echo "ERROR PDO ";
            $this->historisation(LOG_UTILISATEUR, $e);
            return false;
        }
    }

    /**
     * Connection USER
     *
     * @param [type] $email
     * @param [type] $pass
     * @return void
     */
    public function connect($email,$pass){
        try{
            $q = $this->db->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $q->execute([':email'=>$email]);
            if($q->rowCount()==1){
                $tabDonneesUser = $q->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pass, $tabDonneesUser["password"])){
                    return new Utilisateur($tabDonneesUser);
                } else {
                    return Utilisateur::CONNECT_PASS_ERROR;
                }
            } else {
                return Utilisateur::CONNECT_EMAIL_MISS;
            }
        }catch(PDOException $e){
            echo "ERROR PDO ";
            $this->historisation(LOG_UTILISATEUR, $e);
            return false;
        }
    }


}