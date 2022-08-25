<?php
namespace Model\manager;
use \PDO;
use PDOException;
use Model\Utilisateur;
use \Model\trait\Log;

class UtilisateurManager{
    use Log;
    
    private $db;

    const OPTION_CRYPT = 12;

    public function __construct(PDO $db){

        $this->setDb($db);
        return $this;
    }

    public function setDb($db){
        $this->db = $db;
        return $this;
    }

    /**
     * Ajout d'un utilisateur
     *
     * @param Utilisateur $user
     * @return void
     */
    public function createUser(Utilisateur $user){
        
        try{
            $request = $this->db->prepare("SELECT * FROM `utilisateur` WHERE email = :email");
            $request->execute([":email"=>$user->getEmail()]);

            if($request->FETCH(PDO::FETCH_ASSOC)){
                return Utilisateur::ADD_CLIENT_DOUBLON;
            
            } else {
            
            $options = ['cost4' =>self::OPTION_CRYPT];
            $request = $this->db->prepare("INSERT INTO `utilisateur`(`civilite`, `nom`, `prenom`, `naissance`, `email`, `password`, `ip`) VALUES (:civilite, :nom, :prenom, :naissance, :email, :password, :ip) ");
            $request->execute([
                ":civilite"=>$user->getCivilite(), 
                ":nom"=>$user->getNom(),
                ":prenom"=>$user->getPrenom(), 
                ":naissance"=>$user->getNaissance(), 
                ":email"=>$user->getEmail(), 
                //encodage avec password hash.
                ":password"=>password_hash($user->getPassword(), PASSWORD_BCRYPT, $options), 
                ":ip"=>$_SERVER['REMOTE_ADDR']
            ]);  
            return Utilisateur::ADD_CLIENT_OK;
            }
        }catch(PDOException $e){
            $this->historisation(LOG_UTILISATEUR, $e);
            $erreur = "Une erreur est survenue contacter l'administrateur ".ADMIN_MAIL;                
        }  
    }
    

    function connect($email, $password){
        try{
            $options = ['cost'=>self::OPTION_CRYPT];
            $request = $this->db->prepare("SELECT * FROM `utilisateur` WHERE email = :email");
            $request->execute([":email"=>$email]);
            if($request->rowCount()==1){
                $user = $request->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $user["password"])){
                    return new Utilisateur($user);
                }else{
                    return Utilisateur::CONNECT_PASS_ERROR;
                }

            }else{
                return Utilisateur::CONNECT_EMAIL_MISS;
            }
        }catch(PDOException $e){ 
            echo "ERROR PDO";   
            $this->historisation(LOG_UTILISATEUR, $e);         
            return false;             
        }
    }
}