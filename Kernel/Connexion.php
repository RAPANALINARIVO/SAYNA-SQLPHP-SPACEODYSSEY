<?php

namespace kernel;

use PDO;
use Config\DB;
use PDOException;

/**
 * class pour la connexion
 */
class Connexion{

    /**
     * methode static
     *
     * @var object
     */
    private static $pdo;

    private function __construct()
    {
        return ;
    }
/**
 * return $pdo connexion
 *
 * @return object
 */
    public static function getConnexion(){
        if(!isset(self::$pdo))
        {
            try {
                //creation de l'objet
                self::$pdo = new \PDO('mysql:host='.DB::HOST.';dbname='.DB::NAME, DB::USERNAME , DB::PASSWORD);

                //configuration en cas des erreurs
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                //throw $th;
                echo "erreur de connexion". $e->getMessage();
            }
        }
        return self::$pdo;
    }
/**
 * return statement
 *Méthode pour exécuter une requête SQL
 * @param string $query
 * @return string
 */
    public static function request_query($sql, $class, $params = [])
    {
    try {
        $stmt = self::getConnexion()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $class);
        } catch (\PDOException $e) {
        // Affichez la requête complète en cas d'erreur
        echo "Erreur SQL: $sql<br>";
        throw $e;
        }    
    }

    public static function execute($query, $params = [])
    {
        $stmt = self::getConnexion()->prepare($query);
        $stmt->execute($params);
    }

}