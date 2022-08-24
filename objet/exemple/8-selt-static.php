<?php

class A{
    protected $info;

    public static function get_self(){
        return new self();
    }

    public static function get_static(){
        return new static();
    }

    public function __construct(){
        echo "Classe ".__CLASS__."<br/>";
    }
}

class B extends A{
    public function __construct(){
        echo "Classe ".__CLASS__."<br/>";
    }
}

$MonObjetA = new A;
var_dump($MonObjetA);


//equivalent
//grace a la methode get_self, plus besoin d'avoir un new... 
$x = A::get_self();
var_dump($x);

$y = A::get_static();
var_dump($y);

///////////////////////////

$MonObjetB = new B;
var_dump($MonObjetB);

$z = B::get_self();
var_dump($z);

$w = B::get_static();
var_dump($w);



//pour afficher le nom de la classe.
echo "----------------".get_class($w)."-----------------<br/>";


//PAS DE NOTION PARENT
if(get_class($w) == "B"){
    echo "C'est bien un objet de classe B <br/>";
}

//NOTION PARENT ENFANT

//INSTANCEOFF PERMET DE SAVOIR SI $w FAIT BIEN PARTIE DE LA CLASS B.
if($w instanceof B){
    echo "INSTANCEOFF de classe B";
}