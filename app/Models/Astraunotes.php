<?php
namespace app\Models;
use kernel\Model;
use kernel\Connexion;

class Astraunotes extends Model{

    protected static string $table='astraunotes';

    public function save()
    {
        $query = "UPDATE astraunotes SET nom = :name, prenom = :prenom WHERE id = :id";
        $params = [
            'id' => $this->id,
            'name' => $this->nom,
            'prenom' => $this->prenom
            // ... autres colonnes à mettre à jour
        ];

        Connexion::execute($query, $params);
    }

}
