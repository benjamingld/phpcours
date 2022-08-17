<?php

FUNCTION getPDO():PDO{
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $dsn = 'mysql:host='.HOST.';dbname='.DBNAME.';port='.PORT.';charset='.CHARSET;
    return new PDO($dsn, USER, PASSWORD, $options);
}