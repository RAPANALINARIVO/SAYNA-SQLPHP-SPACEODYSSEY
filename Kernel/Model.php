<?php
namespace kernel;

/**
 * class generique pour faciliter la requete 
 */
class Model{

    /**
     * variable pour  la table
     *
     * @var string
     */
        protected static string $table;



    /**
     * return resultat des requetes
     *la fonction get_called_class() fait appel aux classes appropriees
    * @return string
    */
        public static function all()
    {
        $sql= 'SELECT * FROM '.self::getTable();
        //echo "Erreur SQL: $sql<br>"; // Ajoutez cette ligne pour le débogage
        return Connexion::request_query($sql,get_called_class()); 
    }



    /**
     * return un resultat specifique selon l'id 
     *
     * @param int $id
     * @return string
     */
    public static function find($id)
    {
        $sql= 'SELECT * FROM '.self::getTable().' WHERE id=:id';
        $resultat= Connexion::request_query($sql,get_called_class(),['id'=>$id]); 
        if(isset($resultat[0]))
        {
            return $resultat[0];
        }else {
            return null;
        }
    }
    /**
     * return la classe qui est appelee
     *
     * @return string 
     */
    public static function getTable()
    {
        $class=get_called_class();
       return  $class::$table; 
   }

   /**
    *suppression
    *
    * @return void
    */
   public function delete()
    {
        $query = "DELETE FROM " . $this->getTable() . ' where id=:id';
        Connexion::execute($query, ['id' => $this->id]);
    }

    
    /**
     * insert data to database
     *
     * @param Array $data
     * @return void
     */
    public function create($data)
    {
        // Créer la liste des colonnes et des valeurs à insérer
        $columns = implode(',', array_keys($data));
        $values = ':' . implode(',:', array_keys($data));
    
        // Requête SQL d'insertion
        $sql = 'INSERT INTO ' . $this->getTable() . " ($columns) VALUES ($values)";
        // Exécuter la requête
        Connexion::execute($sql, $data);
    }
    

}