<?php
require_once('./Models/model.php');

//afficher la liste des planetes

function vueplanetes()
{
    $planetes=getPlantes();
    include(dirname(__FILE__).'./../Views/vuePlanets.php');
}