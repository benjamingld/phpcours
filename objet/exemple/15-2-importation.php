<?php

include_once("15-1-classe.php");

use \A\B\C\D\E\F\Information as pain;

$info = new pain;
$info->hello();

//ou
$info = new \A\B\C\D\E\F\Information;