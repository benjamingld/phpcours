<?php include("../vendor/autoload.php"); ?>

<?php

function chargerClasse($classe){
    if(file_exists("model/{$classe}.php")){
        require_once "model/{$classe}.php";
    }else{
        echo "Classe non existante";
    }
}

spl_autoload_register("chargerClasse");