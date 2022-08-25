<?php
namespace Model;

use PDO;
use PDOException;
use BadMethodCallException;

class Database{

    const HOST ="localhost";
    const DBNAME ="tpvalenciennes22";
    const USER = "root";
    const PASSWORD = "";
    const PORT = "3306";
    const CHARSET ="utf8";
    private static $instance = null;

    //PERMET DE CREER UN TOKEN UNIQUE DE CONNEXION PDO
    public static function getInstance(){
        if(!self::$instance){
            try{
                self::$instance = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';port='.self::PORT.';charset='.self::CHARSET,self::USER,self::PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("SET NAMES 'UTF8'");
            }catch(PDOException $e){
                echo "ERROR PDO";
                var_dump($e);
            }
            //quio quil je la rennvoie
            return self::$instance;
        }
    }

    //PREMETTANT DE CHANGER LE COMPORTEMENT DE PDO A TRAVERS DATABASEET TRANSFORMER A LA VOLEE LES METHODE PDO EN STATIC.
    //Database::prepare($query);
    //$method = "prepare" $arg = $query (la requete).
    public static function __callStatic($method, $args){

        if(!is_callable([self::getInstance(), $method])){
            throw new BadMethodCallException("METHODE NON DISPO");
        }
        //SI LA METHODE EXISTE JE LA LANCE
        //JE DOIS FOURNIR 2 TABLEAUX
        //1ER TABLEAU = L'OBJET(PDO) ET LA METHODE (EXEMPLE PREPARE)
        //2EME TABLEAU = ARGS EST LE TABLEAU DE PARAMETRE
        return call_user_func_array([self::getInstance(), $method],$args);
           
    }
}


