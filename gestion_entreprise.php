<?php
include_once 'connect.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
  header('location:login_admin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion des entreprises</title>

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
          <h1 class="h3 mb-2 text-gray-800">Gestion des entreprises</h1>
          <p class="mb-4">kach manektbou hna ...</p>
          <?php
                if (isset($_GET['true'])) {
                ?>
                <div class="alert alert-success">
                  <strong>Notification!</strong> Suppression réussie
                </div>
                <?php
                }else if(isset($_GET['false'])){
                ?>
                <div class="alert alert-warning">
                  <strong>Notification!</strong> Suppression non réussie
                </div>
                <?php
                }
                ?>
          <a href="register_entreprise.php">
            <button type="button" class="btn btn-block btn-primary">Ajouter une entreprise</button>
          </a>
          <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold">Nos entreprises</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N°</th>
                      <th>Denomination</th>
                      <th>Nom dirigeant</th>
                      <th>Siege social</th>
                      <th>Phone</th>
                      <th>Détail</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $q="SELECT * FROM `entreprise` WHERE isEmailConfirmed=1 and archived=0";
                    $r=mysqli_query($dbc,$q);
                    while ($row=mysqli_fetch_assoc($r)) {
                    ?>
                    <tr>
                      <td><?= $row['id'] ?></td>
                      <td><?= $row['denomination'] ?></td>
                      <td><?= $row['nom_dirigeant'] ?></td>
                      <td><?= $row['siege_social'] ?></td>
                      <td><?= $row['phone'] ?></td>
                      <td>
                        <a href="profil_entreprise.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-primary">Profil</button>
                        </a>
                      </td>
                      <td>
                        <a href="update_entreprise.php?id=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-success">Modifier</button>
                        </a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#delete_entr<?= $row['id'] ?>">Supprimer</button>

                        <!-- Logout Modal-->
                            <div class="modal fade" id="delete_entr<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer une entreprise</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">Voulez-vous vraiment supprimer cette entreprise ?</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Non</button>
                                    <a class="btn btn-primary" href="delete_entreprise.php?id=<?= $row['id'] ?>">Oui</a>
                                  </div>
                                </div>
                              </div>
                            </div>
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

      <?php
      include 'footer.html';
      ?>

    </div>
    <!-- End of Content Wrapper -->
    

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