<?php
include_once 'connect.php';
session_start();

if(isset($_SESSION['client_id']) || isset($_SESSION['entreprise_id'])){
  header('location:index.php');
}

if (isset($_POST['submit'])) {
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=md5($password);

  $q="SELECT * FROM `entreprise` WHERE `email`='$email' and `password`='$password'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num==1) {
    $row=mysqli_fetch_assoc($r);
  $entreprise_id=$row['id'];
    if ($row['isEmailConfirmed']==1) {
    session_start();
    $_SESSION['entreprise_id']=$row['id'];
    $_SESSION['entreprise_n_serie']=$row['n_serie'];
    $_SESSION['entreprise_denomination']=$row['denomination'];
    $_SESSION['entreprise_nom_dirigeant']=$row['nom_dirigeant'];
    $_SESSION['entreprise_siege_social']=$row['siege_social'];
    $_SESSION['entreprise_description']=$row['description'];
    $_SESSION['entreprise_secteur_act']=$row['secteur_act'];
    $_SESSION['entreprise_phone']=$row['phone'];
    $_SESSION['entreprise_email']=$row['email'];
    $_SESSION['entreprise_password']=$row['password'];
    $_SESSION['entreprise_date']=$row['date'];
    header('location:profil_entreprise.php?id='.$entreprise_id);

    }else{
      $msg="L'email n'est pas activé";
    }
    
  }else{
    $msg="L'adresse E-mail ou mot de passe incorrect !";
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

  <title>S'identifier</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block" style="background-color: #4b79fd">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Connexion d'entreprise</h1>
                    <?php
                if (isset($msg)) {
                ?>
                <div class="alert alert-info">
                  <strong>Notification!</strong> <?= $msg ?>
                </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['success'])) {
                ?>
                <div class="alert alert-success">
                  <strong>Notification!</strong> Votre compte est activé, vous pouvez vous connecter
                </div>
                <?php
                }
                ?>
                  </div>
                  <form class="user" action="login_entreprise.php" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" placeholder="Adresse e-mail" name="email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" placeholder="Mot de passe" name="password">
                    </div>
                    <input type="submit" name="submit" value="S'identifier" class="btn btn-user btn-block btn-primary">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot_entreprise_pass.php">Mot de passe oublié?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register_entreprise.php">Créer un compte!</a>
                  </div>
                  <?php
              if(isset($_SESSION['admin_id'])){
              ?>
              <div class="text-center">
                <a class="small" href="gestion_entreprise.php">Gestion des entreprises</a>
              </div>
              <?php
              }
              ?>
                  <div class="text-center">
                <a class="small" href="index.php">Page d'accueil</a>
              </div>
                </div>
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
