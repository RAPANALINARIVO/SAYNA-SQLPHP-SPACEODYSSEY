<?php
namespace app\Models;
use kernel\Model;
use kernel\Connexion;


/**
 * model Astronaute
 * reference of astronaute's table
 */
class Astronautes extends Model{

    protected static string $table='astronautes';

    /**
     * uptade table's column
     *
     * @return void
     */
    public function save()
    {
        $query = "UPDATE astronautes SET nom = :nom, prenom = :prenom, etat= :etat WHERE id = :id";
        $params = [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'etat'=> $this ->etat
            // ... autres colonnes à mettre à jour
        ];

        Connexion::execute($query, $params);
    }

}
