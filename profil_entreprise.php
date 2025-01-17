<?php
include_once 'connect.php';

session_start();

if(isset($_SESSION['admin_id']) || isset($_SESSION['client_id']) || isset($_SESSION['entreprise_id'])){

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $q="SELECT * FROM `entreprise` WHERE id='$id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
  
}else{
  header('location:index.php');
}

}else{
  header('location:login_client.php');
}

// if (isset($_SESSION['admin_id'])) {
//   $admin_id=$_SESSION['admin_id'];
// }elseif(isset($_SESSION['entreprise_id'])){
//   $entreprise_id=$_SESSION['entreprise_id'];
//   if($entreprise_id!=$id){
//     header('location:index.php');
//   }
// }else{
//   header('location:index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profil entreprise</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php
    include 'sidebar.html';
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        include 'topbar.html';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php
          $row=mysqli_fetch_assoc($r);
          ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>A propos de l'entreprise</b></h5>
                            <p><b>Type : </b><?= $row['type'] ?></p>
                            <p><b>Nom du derigeant : </b><?= $row['nom_dirigeant'] ?></p>
                            <p><b>Denomination : </b><?= $row['denomination'] ?></p>
                            <p><b>Description : </b><?= $row['description'] ?></p>
                            <p><b>Secteur d'activité : </b><?= $row['secteur_act'] ?></p>
                            <p><b>Siege social : </b><?= $row['siege_social'] ?></p>
                            <p><b>Numéro de téléphone : </b><?= $row['phone'] ?></p>
                            <p><b>Adresse e-mail : </b><?= $row['email'] ?></p>
                        </div>
                        <div class="col-md-6">
                          <p><b>date d'inscription : </b><?= $row['date'] ?></p>
                          <?php 
                              if(isset($_SESSION['admin_id'])){
                                $s_admin_id=$_SESSION['admin_id'];
                              }
                              if(isset($_SESSION['entreprise_id'])){
                                $s_entreprise_id=$_SESSION['entreprise_id'];
                              }
                              if(isset($s_admin_id) || (isset($s_entreprise_id) and $s_entreprise_id==$id)){
                              ?>
                            <a href="update_entreprise.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Paramètres du compte</button>
                            </a>
                            <?php 
                              }
                              if(isset($_SESSION['admin_id'])){
                              ?>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_entreprise<?= $row['id'] ?>">Supprimer cette entreprise</button>
                              <?php } ?>
                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_entreprise<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer une entreprise</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer cette  entrr ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_entreprise.php?id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <br>
                            <?php
                                $q0="SELECT * FROM `abonnemententreprise` where entreprise_id='$id' and archived=0";
                                //echo $q;exit();
                                $r0=mysqli_query($dbc,$q0);
                                $row0=mysqli_fetch_assoc($r0);

                                $date=date("Y-m-d");

                                if($row0){
                                $date_fin=$row0['date_fin'];

                                $date_24 = date('Y-m-d', strtotime("-1 day", strtotime($date_fin)));

                                if($date_fin < $date){
                                  if(isset($_SESSION['entreprise_id'])){
                                  ?>
                                  <a href="ajouter_abonnement_entreprise.php">
                              <button type="button" class="btn btn-info btn-block">ABONNEMENT</button>
                            </a>
                            <br>
                                  <div class="alert alert-danger" role="alert">
                                    <strong>Notification</strong> Votre abonnement est terminé le <?= $date_fin ?>
                                  </div>
                                  <?php
                                }
                                }

                                if($date_24==$date){
                                  if(isset($_SESSION['entreprise_id'])){
                                  ?>
                                  <div class="alert alert-warning" role="alert">
                                    <strong>Notification</strong> Votre abonnement va terminé dans 24h
                                  </div>
                                  <?php
                                }
                              }
                              }
                                ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1">
            <img src="<?= $row['img'] ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <br><br><br>
        </div>
    </div>
    <hr>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Les offres de stages de cette entreprise</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Titre</th>             
                      <th>Nombre de places</th>
                      <th>Nature de l'offre</th>
                      <th>Detail offre</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q="SELECT * FROM `offre`where id_entreprise= '$id' ";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    ?>
                    <tr>
                      <td><?= $row['id'] ?></td>
                
                      <td><?= $row['title']?></td>

                      <td><?= $row['n_places'] ?></td>
                      <td><?= $row['nature_offre'] ?></td>
                      
                      <td>
                      <a href="dt_off.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Details</button>
                        </a> 
                      </td>
                      
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
   
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

    </div>
    <!-- End of Content Wrapper -->
<?php
        include 'footer.html';
        ?>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
