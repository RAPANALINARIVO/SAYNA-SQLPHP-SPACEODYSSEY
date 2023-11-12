<?php

CONST DB_NAME ='spaces_db';
CONST DB_HOST ='localhost';
CONST DB_USERNAME ='root';
CONST DB_PASSWORD ='';

  function getConnexion(){

        try {
            //creation de l'objet
            $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME , DB_PASSWORD);

            //configuration en cas des erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //throw $th;
            echo "erreur de connexion". $e->getMessage();
        }
    return $pdo;
}
