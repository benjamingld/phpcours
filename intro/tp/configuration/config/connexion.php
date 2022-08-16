<?php
function getPDO():PDO{
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",

    ];
    return new PDO(DSN,DB_USER,DB_PASS,$options);
}