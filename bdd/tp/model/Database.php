<?php
namespace Model;

use BadMethodCallException;
use PDO;
use PDOException;

class Database{
    const HOST = "localhost";
    const DBNAME = "tpvalenciennes22";
    const USER = "root";
    const PASSWORD = "";
    const PORT = "3306";
    const CHARSET = "utf8";
    private static $instance = null;


    //PERMET DE ME CREER UN TOKEN UNIQUE DE CONNEXION A PDO
    public static function getInstance(){
        //SI L'INSTANCE EXISTE PAS JE LA CREE
        if(!self::$instance){
            try{
                self::$instance = new PDO('mysql:host='.self::HOST.';dbname='.self::DBNAME.';port='.self::PORT.';charset='.self::CHARSET, self::USER, self::PASSWORD);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("SET NAMES 'UTF8'");
            }catch(PDOException $e){
                echo "ERROR PDO ";
                var_dump($e);
            }
        }
        //QUOI QU'IL JE LA RENVOIE
        return self::$instance;
    }

    //PERMETTANT DE CHANGER LE COMPORTEMENT DE PDO A TRAVERS DATABASE ET TRANSFORMER A LA VOLEE LES METHODE PDO EN STATIC
    //Database::prepare($query);
    //$method = "prepare" $args = $query (le requete)
    public static function __callStatic($method,$args){
        //SI DANS PDO IL N'YA PAS LA METHODE QUE L'ON ESSAYE DE LANCER EN STATIC JE LANCE UNE EXECEPTION
        if(!is_callable([self::getInstance(),$method])){
            throw new BadMethodCallException("METHODE NON DISPO");
        }
        //SI LA METHODE EXISTE JE LA LANCE 
        //JE DOIS LUI FOUNIR DEUX TABLEAUX
        //1 - L'OBJET(PDO) ET LE METHODE (EXEMPLE PREPARE)
        //2 - ARGS EST LE TABLEAU DE PARAMETRE
        return call_user_func_array([self::getInstance(),$method],$args);
        //DATABASE::PREPARE($query);
            


    }
}



