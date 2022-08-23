<?php
require_once 'configuration/setup.php';

class News{

    private $id;
    private $titre;
    private $description;
    private $date;


    private function hydrate(array $data){
        foreach($data as $key=>$value){
            $method = 'set'.$key;
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data){
        $this->hydrate($data);
    }
    

    //-------------------------------------
    //          GETTER & SETTER
    //-------------------------------------

    public function getId(){return $this->id;}
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(){return $this->description;}
    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function getDate(){return $this->date;}
    public function setDate($date){
        $this->date = $date;
        return $this;
    }


}