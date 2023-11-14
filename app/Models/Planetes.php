<?php
namespace app\Models;
use kernel\Model;
use kernel\Connexion;

class Planetes extends Model{

    protected static string $table='planetes';

    public function save()
    {
        $query = "UPDATE planetes SET nomPlanete = :name, distanceTerre = :distance WHERE id = :id";
        $params = [
            'id' => $this->id,
            'name' => $this->nomPlanete,
            'distance' => $this->distanceTerre
            // ... autres colonnes à mettre à jour
        ];

        Connexion::execute($query, $params);
    }

}

