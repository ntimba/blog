<?php

try
{
    $bddPDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .';charset=utf8', DB_USER, DB_PASSWORD);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}