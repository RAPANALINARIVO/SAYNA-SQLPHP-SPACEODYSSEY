<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-6">
                <h1>Create a new Astronaute</h1>
                    <form class="form" action="?controller=Astronautes&action=create" method="post">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                        <label for="firstname">First name :</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" required>
                        <label for="status">Status :</label>
                        <input class="form-control" type="text" name="status" id="status" required>
                        <!-- Ajoutez d'autres champs du formulaire si nécessaire -->
                        <button class="btn btn-primary float float-right" type="submit">save astronaute</button>
                    </form>
                    <a class="btn btn-success" href="?controller=Astronautes&action=index">Back to Astronaute list</a>
                    
                </div>
                <div class="col-2"></div>
            </div>
        </div>
<?= include('../app/Views/footer.php'); ?>

