<?php

session_start();
//SUPPRIMER LA SESSION
session_destroy();
//REDIRECTION
header("location: 20-session-init.php");