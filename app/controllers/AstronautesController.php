<?php

namespace app\Controllers;
use kernel\View;
use kernel\Controller;
use app\Models\Astraunotes;

class AstraunotesController extends Controller
{

    /**
     * return new view
     *
     * @return object
     */
    public function index()
    {
        $astro=Astraunotes::all();
        return new View('astraunotes/index.php',['astro'=>$astro]);
    }

    /**
     * return form edit
     *
     * @return object
     */
    public function edit()
    {
        $astro = Astraunotes::find($_GET['astro']);
        return new View('astraunotes/form.php', ['astro' => $astro]);
    }

    public function update()
    {

        $astro = Astraunotes::find($_POST['idAstro']);
        $astro->nom = $_POST['nom'];
        $astro->prenom =$_POST['prenom'];
        $astro->save();

        header('Location:.?controller=Astraunotes&action=index');
    }

    public function delete()
    {
        $astro = Astraunotes::find($_GET['astro']);
        return new View('astraunotes/confirmDelete.php', ['astro' => $astro]);
    }

    public function deleteConfirm()
    {
        $astro =Astraunotes::find($_POST['idAstro']);
        $astro->delete();

        header('Location:.?controller=Astraunotes&action=index');
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

            // Instancier un nouvel objet astraunote
            $newAstro = new Astraunotes();

            // Appeler la méthode create du modèle pour insérer les données
            $newAstro->create($postData);

            // Rediriger vers la page d'index après la création
            header('Location: .?controller=Astraunotes&action=index');
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            // Afficher le formulaire de création
            return new View('astraunotes/createForm.php',$data=[]);
        }
    }

}