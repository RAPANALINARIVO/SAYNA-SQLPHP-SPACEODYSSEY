<?php
namespace app\Controllers;

use kernel\View;
use kernel\Controller;
use app\Models\Astronautes;
class AstronautesController extends Controller
{

    /**
     * return new view
     *
     * @return object
     */
    public function index()
    {
        $astro=Astronautes::all();
        return new View('astronautes/index.php',['astro'=>$astro]);
    }

    /**
     * return form edit
     *
     * @return object
     */
    public function edit()
    {
        $astro = Astronautes::find($_GET['astro']);
        return new View('astronautes/form.php', ['astro' => $astro]);
    }

    public function update()
    {

        $astro = Astronautes::find($_POST['id']);
        $astro->nom =htmlspecialchars($_POST['nom']);
        $astro->prenom = htmlspecialchars($_POST['prenom']);
        $astro->etat = htmlspecialchars($_POST['etat']);
        $astro->save();
        header('Location:.?controller=Astronautes&action=index');
    }

    public function delete()
    {
        $astro = Astronautes::find($_GET['astro']);
        return new View('astronautes/confirmDelete.php', ['astro' => $astro]);
    }

    public function deleteConfirm()
    {
        $astro =Astronautes::find($_POST['id']);
        $astro->delete();

        header('Location:.?controller=Astronautes&action=index');
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
                'nom' =>  htmlspecialchars($_POST['name']) ,
                'prenom'=> htmlspecialchars($_POST['firstname']),
                'etat' =>htmlspecialchars($_POST['status'])
                // Ajoutez d'autres champs si nécessaire
            ];

            // Instancier un nouvel objet astraunote
            $newAstro = new Astronautes();

            // Appeler la méthode create du modèle pour insérer les données
            $newAstro->create($postData);

            // Rediriger vers la page d'index après la création
            header('Location: .?controller=Astronautes&action=index');
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            // Afficher le formulaire de création
            return new View('astronautes/createForm.php',$data=[]);
        }
    }

}