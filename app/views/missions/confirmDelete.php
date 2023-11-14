<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>

<a href=".?controller=Planetes&action=index">Retour</a></br>
<h2>Confirmez la suppression de "<?= $planete->nomPlanete; ?>"</h2>

<div class="row">
    <form action=".?controller=Planetes&action=deleteConfirm" class="" method="POST">
        <input type="hidden" name="idPlanete" value="<?= $planete->id; ?>" />
        <input class="btn btn-danger" type="submit" value="Supprimer" />
    </form>
</div>

<?= include('../app/Views/footer.php'); ?>