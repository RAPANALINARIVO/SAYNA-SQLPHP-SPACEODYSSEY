<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>

<!-- Main content -->
<div class="container">
    <div class="row">
       <div class="col-4"></div>
       <div class="col-6">
       <h4><?php echo 'Will you really want to edit  '.strtoupper($planete->nomPlanete).'?';?></h4>
        <form  action=".?controller=Planetes&action=update" class="form" method="POST">
            <input class="form-control" type="hidden" name="idPlanete" value="<?= $planete->id; ?>" /><br>
            name :
            <input class="form-control" type="text" name="nomPlanete" value="<?= $planete->nomPlanete; ?>" /><br>
            distance from earth en KM:
            <input type="text" class="form-control" name="distanceTerre" value="<?php $planete->distanceTerre; ?>">
            <input class="btn btn-primary" type="submit" />
        </form>
       </div>
    </div>
</div>

<?= include('../app/Views/footer.php'); ?>