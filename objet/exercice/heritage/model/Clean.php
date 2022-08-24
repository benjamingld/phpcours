<?php

trait Clean{

    public function write($var){
        return htmlspecialchars($var);
    }

    public function writeSpecial($var){
        return htmlentities($var);
    }

}