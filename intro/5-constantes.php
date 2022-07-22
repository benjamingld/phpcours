<?php

define("ADMIN_EMAIL", "admin@test.fr");

echo ADMIN_EMAIL;

//SI LA CONSTANTE est défini (attention au guillemet)
if(defined("ADMIN_EMAIL")) {
    echo "--------------ADMIN DEFINIE----------------";
} else {
    echo "--------------ADMIN NON DEFINIE----------------";
}


//ne pas redefinir une constante
define("ADMIN_EMAIL", "admin3@test3.fr");