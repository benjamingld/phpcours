<?php
function division($a,$b){
    if($b == 0){
        throw new Exception('Désolé, impossible de divisé par 0');
    }
    return $a/$b;
    
}

try{
    echo division(5,0);
}catch (Exception $e){
    echo $e->getMessage();
    echo $e->getFile();
    var_dump($e);
}


