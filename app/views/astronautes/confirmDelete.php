<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>


<div class="row">
   <div class="col-1"></div>
   <div class="col-7">
    <h2>Confirmez la suppression de :"<?php echo strtoupper( $astro->nom.' '.$astro->prenom);?>"</h2>

   <form action=".?controller=Astronautes&action=deleteConfirm" class="form" method="POST">
        <input type="hidden" name="id" value="<?= $astro->id; ?>" />
        <input class="btn btn-danger float float-left " type="submit" value="Supprimer" />
    </form>
    <a class="btn btn-info" href=".?controller=Astronautes&action=index">Retour</a></br>
   </div>
</div>

<?= include('../app/Views/footer.php'); ?>