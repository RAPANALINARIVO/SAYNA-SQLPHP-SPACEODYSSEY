<?php
 include('../app/views/header.php');
?>

    <!-- Main content -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LISTE DES PLANETES</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=".?controller=Astronautes&action=create">New mission</a></li>
              <li class="breadcrumb-item"><a href=".?controller=Astronautes&action=create">New astronaute</a></li>
              <li class="breadcrumb-item"><a href=".?controller=Planetes&action=create">New Planete</a></li>
              <li class="breadcrumb-item active">contact-nous</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="container">
       <div class="row">
          <table class="table table-bordered table-striped">
              <thead>
                <th>Planete name</th>
                <th>Distance from earth</th>
                <th>Actions</th>
              </thead>
              <tbody>
              <?php
              foreach($planete as $p) : ?>
                <tr>
                  <td><?php echo $p->nomPlanete; ?></td>
                  <td><?php echo $p->distanceTerre ?></td>
                  <td>
                    <?php 

                    //edit button
                    $url= '.?controller=Planetes&action=edit&planete='.$p->id;
                    $label = 'edit';
                    $type= 'primary';
                    include('../app/views/components/button.php');


                    //delete button
                    $url = '.?controller=Planetes&action=delete&planete=' . $p->id;
                    $type ='danger';
                    $label = 'Delete';
                    include('../app/Views/components/button.php');
                     ?>
                  </td>
                </tr>
              <?php
              endforeach
              ?>
              </tbody>
          </table>
       </div>
    </div>
    <!-- /.content -->
<?php
include('../app/views/footer.php');
?>
 