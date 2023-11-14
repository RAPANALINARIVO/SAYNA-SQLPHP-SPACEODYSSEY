<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                <h1>Create a new Planete</h1>
                    <form class="form" action="?controller=Planetes&action=create" method="post">
                        <label for="name">Planete Name:</label>
                        <input class="form-control" type="text" id="name" name="nomPlanete" required>
                        <label for="name">Distance from earth :</label>
                        <input class="form-control" type="text" name="distanceTerre" required>
                        <!-- Ajoutez d'autres champs du formulaire si nécessaire -->
                        <button class="btn btn-primary" type="submit">Create Planete</button>
                    </form>
                    <p><a href="?controller=Planetes&action=index">Back to Planete list</a></p>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
<?= include('../app/Views/footer.php'); ?>

