<?php
include_once 'connect.php';

session_start();
if (!isset($_SESSION['admin_id'])) {
  header('location:index.php');
}

if (isset($_GET['id'])) {

  $id=$_GET['id'];

  $q="SELECT * FROM `admin` WHERE id='$id'";
  $r=mysqli_query($dbc,$q);
  $num=mysqli_num_rows($r);

  if ($num!=1) {
    header('location:index.php');
  }

    if($_SESSION['admin_id']==1 || $_SESSION['admin_id']==$id){

      if (isset($_POST['submit'])) {
        $sexe=$_POST['sexe'];
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $n_cni=$_POST['n_cni'];
      $adr=$_POST['adr'];
      $phone=$_POST['phone'];
      $admin_id=$_POST['admin_id'];
    
            $q="UPDATE `admin` SET `sexe`='$sexe',`firstname`='$firstname',`lastname`='$lastname',`n_cni`='$n_cni',`adr`='$adr',`phone`='$phone' WHERE id='$admin_id'";
    
            $r=mysqli_query($dbc,$q);
    
            $msg="Les informations ont été modifiées avec succès!";
    
    }
    }else{
      header('Location: index.php');
    }

}else{
    header('Location: index.php');
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

  <title>Modifier un admin</title>

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
                <h1 class="h4 text-gray-900 mb-4">Modifier un admin</h1>
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
              <?php
              $qs="SELECT * FROM `admin` WHERE id='$id'";
              $rs=mysqli_query($dbc,$qs);
              $rows=mysqli_fetch_assoc($rs);
              ?>
              <form class="user" action="update_admin.php?id=<?= $id ?>" method="post">
              <div class="form-group">
                  <label for="sel1">Genre</label>
                  <select class="form-control" id="sel1" name="sexe">
                    <option value="<?= $rows['sexe'] ?>"><?= $rows['sexe'] ?></option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label>Nom</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['firstname'] ?>" name="firstname" required>
                  </div>
                  <div class="col-sm-6">
                    <label>Prénom</label>
                    <input type="text" class="form-control form-control-user" value="<?= $rows['lastname'] ?>" name="lastname" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Numéro CNI</label>
                  <input type="number" class="form-control form-control-user" value="<?= $rows['n_cni'] ?>" name="n_cni" required>
                </div>
                <div class="form-group">
                  <label>Adresse postale</label>
                  <input type="text" class="form-control form-control-user" value="<?= $rows['adr'] ?>" name="adr" required>
                </div>
                <div class="form-group">
                  <label>Numéro de téléphone</label>
                  <input type="number" class="form-control form-control-user" value="<?= $rows['phone'] ?>" name="phone" required>
                </div>

                <input type="hidden" name="admin_id" value="<?= $id ?>">
                <input type="submit" name="submit" class="btn btn-user btn-block btn-success" value="Modifier">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="update_admin_pass.php?id=<?= $id ?>">Modifier le mot de pass</a>
              </div>
              <div class="text-center">
                <a class="small" href="profil_admin.php?id=<?= $id ?>">Retour au compte personnel</a>
              </div>
              <?php
              if(isset($_SESSION['admin_id']) and $_SESSION['admin_id']==1){
              ?>
              <div class="text-center">
                <a class="small" href="gestion_admin.php">Gestion des administrateurs</a>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
