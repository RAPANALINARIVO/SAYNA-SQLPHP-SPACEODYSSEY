<?php
require_once('./Config/Connexion.php');

function getPlantes()
{
    $connexion=getConnexion();
    $planetes=$connexion->query('SELECT * FROM planetes');
    return $planetes;
}