<?php

namespace app\Controllers;
use app\Models\Planetes;
use kernel\Controller;
//  use kernel\Model;
use kernel\View;

class PlanetesController extends Controller
{

    /**
     * return new view
     *
     * @return object
     */
    public function index()
    {
        $planetes=Planetes::all();
        return new View('planetes/index.php',['planete'=>$planetes]);
    }

    /**
     * return form edit
     *
     * @return object
     */
    public function edit()
    {
        $planetes = Planetes::find($_GET['planete']);
        return new View('planetes/form.php', ['planete' => $planetes]);
    }

    public function update()
    {

        $planetes = Planetes::find($_POST['idPlanete']);
        $planetes->nomPlanete = $_POST['nomPlanete'];
        $planetes->distanceTerre =$_POST['distanceTerre'];
        $planetes->save();

        header('Location:.?controller=Planetes&action=index');
    }

    public function delete()
    {
        $planetes = Planetes::find($_GET['planete']);
        return new View('planetes/confirmDelete.php', ['planete' => $planetes]);
    }

    public function deleteConfirm()
    {
        $planetes =Planetes::find($_POST['idPlanete']);
        $planetes->delete();

        header('Location:.?controller=Planetes&action=index');
    }
    
    /**
     * verify  the data send by users and save it on database
     *
     * @return object
     */
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les données du formulaire
            $postData = [
                'nomPlanete' => $_POST['nomPlanete'],
                'distanceTerre'=> $_POST['distanceTerre']
                // Ajoutez d'autres champs si nécessaire
            ];

            // Instancier un nouvel objet Pays
            $newPays = new Planetes();

            // Appeler la méthode create du modèle pour insérer les données
            $newPays->create($postData);

            // Rediriger vers la page d'index après la création
            header('Location: .?controller=Planetes&action=index');
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            // Afficher le formulaire de création
            return new View('planetes/createForm.php',$data=[]);
        }
    }

}