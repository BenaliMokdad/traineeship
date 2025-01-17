<?php
include_once 'connect.php';

session_start();

if(isset($_SESSION['admin_id']) || isset($_SESSION['client_id']) || isset($_SESSION['entreprise_id'])){
}else{
  header('location:login_client.php');
}

if (isset($_GET['id'])) {
  $id=$_GET['id'];

  $q="SELECT * FROM `offre` WHERE id='$id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }
  
}else{
  header('location:index.php');
}

// if (isset($_SESSION['client_id'])) {
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

  <title>Offre d'emploi</title>

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
          $off_id=$row['id'];
          $ent_id=$row['id_entreprise'];

          $q0="SELECT * FROM `entreprise` WHERE `id`='$ent_id'";
          $r0=mysqli_query($dbc,$q0);
          $row0=mysqli_fetch_assoc($r0);
          ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <div class="row">
                        <div class="col-md-6">
                            <h5><b>Détail de l'offre d'emploi</b></h5>
                            <p><b>Par l'entreprise : </b> <a href="profil_entreprise.php?id=<?= $ent_id ?>"><?= $row0['denomination'] ?></a></p>
                            <p><b>Titre : </b><?= $row['title'] ?></p>
                            <p><b>Détail : </b><?= $row['dt'] ?></p>
                            <p><b>Nombre de places : </b><?= $row['n_places'] ?></p>
                            <p><b>La nature du offre : </b><?= $row['nature_offre'] ?></p>
                            <p><b>Specialite : </b><?= $row['Specialite'] ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><b>date de création : </b><?= $row['date'] ?></p>
                            <?php 
                              if(isset($_SESSION['entreprise_id'])){
                                if($_SESSION['entreprise_id']==$ent_id){
                                  ?>
                                  <a href="update_off.php?id=<?= $row['id'] ?>">
                              <button type="button" class="btn btn-success btn-block">Modifier l'offre d'emploi</button>
                            </a>
                            <br>
                              <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_off<?= $row['id'] ?>">Supprimer l'offre d'emploi</button>
                                  <?php
                                  }
                                  ?>
                            
                              <?php } ?>
                             <!-- Logout Modal-->
                            <div class="modal fade" id="delete_off<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer l'offre d'emploi</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer ce l'offre d'emploi ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_off.php?id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
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
