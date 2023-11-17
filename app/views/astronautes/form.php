<!DOCTYPE html>
<?php
include('../app/Views/header.php');
?>

<!-- Main content -->
<div class="container">
    <div class="row">
       <dv class="col-1"></dv>
       <div class="col-8">
       <h4><?php echo strtoupper($astro->nom .' '.$astro->prenom) ;?></h4> <br>
        <form action=".?controller=Astronautes&action=update" class="form" method="POST">
            <input class="form-control" type="hidden" name="id" value="<?php echo $astro->id ?>" >
            <input class="form-control" type="text" name="nom" value="<?php echo $astro ->nom ?>" > <br>
            <input class="form-control" type="text" name="prenom" value="<?php echo $astro ->prenom ?>" > <br>
            <input class="form-control" type="text" name="etat" value="<?php echo $astro ->etat ?>" > <br>
            <input class="btn btn-warning float float-right" type="submit" />
        </form>
       </div>
    </div>
</div>

<?= include('../app/Views/footer.php'); ?>