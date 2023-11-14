<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>

<!-- Main content -->
<div class="container">
    <div class="row">
        <h4><?= $planete->nomPlanete; ?></h4> <br>
        <form action=".?controller=Planetes&action=update" class="" method="POST">
            <input type="hidden" name="idPlanete" value="<?= $planete->id; ?>" />
            <input type="text" name="nomPlanete" value="<?= $planete->nomPlanete; ?>" /> <br>
            <input type="text" name="distanceTerre" value="<?php $planete->distanceTerre ?>" />
            <input type="submit" />
        </form>
    </div>
</div>

<?= include('../app/Views/footer.php'); ?>