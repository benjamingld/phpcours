<?php

namespace Model\trait;

    trait Clean{
        public function w($var){
            return htmlspecialchars(($var));
        }

        public static function write($var){
            return htmlspecialchars($var);
        }
    }