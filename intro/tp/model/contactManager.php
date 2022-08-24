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
}