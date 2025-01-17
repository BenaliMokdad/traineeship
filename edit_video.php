<?php
include_once 'connect.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
  header('location:index.php');
}else{
    $id=$_SESSION['admin_id'];
}

//$c_id=$_SESSION['client_id'];

if (isset($_POST['submit'])) {
    
    $url=$_POST['url'];

  $q="UPDATE `video` SET `url`='$url' WHERE id=1";
  $r=mysqli_query($dbc,$q);

if ($r) {
  $msg= "La vidéo a été modifiée avec succès";
}else{
  $msg= "La vidéo n'a pas été modifiée. Il y a un problème. Réessayez";
}

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

  <title>Modifier la vidéo</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block" style="background-color: #4b79fd">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Modifier la vidéo</h1>
                <?php
                if (isset($msg)) {
                ?>
                <div class="alert alert-info">
                  <strong>Notification!</strong> <?= $msg ?>
                </div>
                <?php
                }
                ?>

              </div>

              <form action="edit_video.php" method="post">
              <div class="form-group">
                <label for="url">URL de Youtube Vidéo</label>
                <input type="url" class="form-control" name="url" placeholder="URL de Youtube Vidéo">
            </div>
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="profil_admin.php?id=<?= $id ?>">Mon profil</a>
              </div>
              <div class="text-center">
                <a class="small" href="index.php">Page d'accueil</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>