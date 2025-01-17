<?php
include_once 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Page d'accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css2/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css2/animate.css">
    
    <link rel="stylesheet" href="css2/owl.carousel.min.css">
    <link rel="stylesheet" href="css2/owl.theme.default.min.css">
    <link rel="stylesheet" href="css2/magnific-popup.css">

    <link rel="stylesheet" href="css2/aos.css">

    <link rel="stylesheet" href="css2/ionicons.min.css">

    <link rel="stylesheet" href="css2/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css2/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css2/flaticon.css">
    <link rel="stylesheet" href="css2/icomoon.css">
    <link rel="stylesheet" href="css2/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-md-4	">
	      <a class="navbar-brand" href="index.php">Traineeship</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Page d'accueil</a></li>
	          <li class="nav-item"><a href="offres.php" class="nav-link">Les offres d'emploi</a></li>
	          <li class="nav-item"><a href="entreprises.php" class="nav-link">Entreprises</a></li>
	          
			  <?php
			  if(isset($_SESSION['admin_id'])){
				?>
					<li class="nav-item btn btn-success mr-md-1"><a href="profil_admin.php?id=<?= $_SESSION['admin_id'] ?>" class="nav-link"><?= $_SESSION['admin_firstname']." ".$_SESSION['admin_lastname'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  
				<?php }elseif(isset($_SESSION['client_id'])){ ?>
				
					<li class="nav-item btn btn-success mr-md-1"><a href="profil_client.php?id=<?= $_SESSION['client_id'] ?>" class="nav-link"><?= $_SESSION['client_firstname']." ".$_SESSION['client_lastname'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  
			  <?php }elseif(isset($_SESSION['entreprise_id'])){ ?>
				<li class="nav-item btn btn-success mr-md-1"><a href="profil_entreprise.php?id=<?= $_SESSION['entreprise_id'] ?>" class="nav-link"><?= $_SESSION['entreprise_denomination'] ?></a></li>
			  <li class="nav-item btn btn-danger"><a href="logout.php" class="nav-link">Se déconnecter</a></li>
			  <?php }else{ ?>
			  
			  
			  <li>
			  <div class="dropdown">
				<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
				Register
				</button>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="register_admin.php">Admin</a>
				<a class="dropdown-item" href="register_client.php">Client</a>
				<a class="dropdown-item" href="register_entreprise.php">Entreprise</a>
				</div>
			</div>
			  </li>
			  <li>.</li>
			  <li>
			  <div class="dropdown">
				<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
				Login
				</button>
				<div class="dropdown-menu">
				<a class="dropdown-item" href="login_admin.php">Admin</a>
				<a class="dropdown-item" href="login_client.php">Client</a>
				<a class="dropdown-item" href="login_entreprise.php">Entreprise</a>
				</div>
			</div>
			  </li>
			  <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap img" style="background-image: url(images/bg_1.jpg);">
      <div class="overlay"></div>
      <div class="container">
      	<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
	        <div class="col-md-10 d-flex align-items-center ftco-animate">
	        	<div class="text text-center pt-5 mt-md-5">
	        		<p class="mb-4">Trouver des opportunités d'emploi, d'emploi et de carrière</p>
	            <h1 class="mb-5">La façon la plus simple d'obtenir votre nouvel emploi</h1>
							<div class="ftco-counter ftco-no-pt ftco-no-pb">
			        	<div class="row">
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-resume"></span>
								  </div>
								  <?php
								  $q="SELECT * FROM `offre` where archived=0";
								  $r=mysqli_query($dbc,$q);
								  $num=mysqli_num_rows($r);
								  ?>
				              	<div class="desc text-left">
					                <strong class="number" data-number="<?= $num ?>">0</strong>
					                <span>Offres</span>
				                </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-visitor"></span>
								  </div>
								  <?php
								  $q1="SELECT * FROM `entreprise` where archived=0";
								  $r1=mysqli_query($dbc,$q1);
								  $num1=mysqli_num_rows($r1);
								  ?>
				              	<div class="desc text-left">
					                <strong class="number" data-number="<?= $num1 ?>">0</strong>
					                <span>Entreprise</span>
					              </div>
				              </div>
				            </div>
				          </div>
				          <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
				            <div class="block-18 text-center">
				              <div class="text d-flex">
				              	<div class="icon mr-2">
				              		<span class="flaticon-resume"></span>
								  </div>
								  <?php
								  $q2="SELECT * FROM `client` where archived=0";
								  $r2=mysqli_query($dbc,$q2);
								  $num2=mysqli_num_rows($r2);
								  ?>
				              	<div class="desc text-left">
					                <strong class="number" data-number="<?= $num2 ?>">0</strong>
					                <span>Employés</span>
					              </div>
				              </div>
				            </div>
				          </div>
				        </div>
					</div>
							<!-- <div class="ftco-search my-md-5">
								<div class="row">
			            <div class="col-md-12 nav-link-wrap">
				            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Trouver un travail</a>

				              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Trouver un candidat</a>

				            </div>
						  </div>
						  
				          <div class="col-md-12 tab-wrap">
				            
				            <div class="tab-content p-4" id="v-pills-tabContent">

				              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
				              	<form action="index" class="search-job">
				              		<div class="row no-gutters">
				              			<div class="col-md mr-md-2">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="select-wrap">
							                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
							                      <select name="" id="" class="form-control">
							                      	<option value="">Category</option>
							                      	<option value="">Full Time</option>
							                        <option value="">Part Time</option>
							                        <option value="">Freelance</option>
							                        <option value="">Internship</option>
							                        <option value="">Temporary</option>
							                      </select>
							                    </div>
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
								                	<button type="submit" class="form-control btn btn-primary">Chercher</button>
									              </div>
								              </div>
				              			</div>
				              		</div>
				              	</form>
				              </div>

				              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
				              	<form action="#" class="search-job">
				              		<div class="row">
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
					              					<div class="select-wrap">
							                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
							                      <select name="" id="" class="form-control">
							                      	<option value="">Category</option>
							                      	<option value="">Full Time</option>
							                        <option value="">Part Time</option>
							                        <option value="">Freelance</option>
							                        <option value="">Internship</option>
							                        <option value="">Temporary</option>
							                      </select>
							                    </div>
									              </div>
								              </div>
				              			</div>
				              			<div class="col-md">
				              				<div class="form-group">
				              					<div class="form-field">
									                <button type="submit" class="form-control btn btn-primary">Chercher</button>
									              </div>
								              </div>
				              			</div>
				              		</div>
				              	</form>
							  </div>
							  
				            </div>
						  </div>
				        </div>
					</div> -->
					----
	          </div>
	        </div>
	    	</div>
      </div>
    </div>

    <!-- <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="category-wrap">
    					<div class="row no-gutters">
    						<div class="col-md-2">
    							<div class="top-category text-center no-border-left">
    								<h3><a href="#">Website &amp; Software</a></h3>
    								<span class="icon flaticon-contact"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Education &amp; Training</a></h3>
    								<span class="icon flaticon-mortarboard"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Graphic &amp; UI/UX Design</a></h3>
    								<span class="icon flaticon-idea"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Accounting &amp; Finance</a></h3>
    								<span class="icon flaticon-accounting"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Restaurant &amp; Food</a></h3>
    								<span class="icon flaticon-dish"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    						<div class="col-md-2">
    							<div class="top-category text-center">
    								<h3><a href="#">Health &amp; Hospital</a></h3>
    								<span class="icon flaticon-stethoscope"></span>
    								<p><span class="number">143</span> <span>Open position</span></p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->

    <!-- <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Job Categories</span>
            <h2 class="mb-0">Top Categories</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Web Development <br><span class="number">354</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Graphic Designer <br><span class="number">143</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Multimedia <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Advertising <br><span class="number">90</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Education &amp; Training <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">English <br><span class="number">200</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Social Media <br><span class="number">300</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Writing <br><span class="number">150</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">PHP Programming <br><span class="number">400</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Project Management <br><span class="number">100</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Finance Management <br><span class="number">222</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Office &amp; Admin <br><span class="number">123</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<ul class="category text-center">
        			<li><a href="#">Web Designer <br><span class="number">324</span> <span>Open position</span></span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Customer Service <br><span class="number">564</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Marketing &amp; Sales <br><span class="number">234</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        			<li><a href="#">Software Development <br><span class="number">425</span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
        		</ul>
        	</div>
        </div>
    	</div>
    </section> -->

    <!-- <section class="ftco-section services-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-resume"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Millions of Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-team"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-career"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Top Careers</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-employees"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Search Expert Candidates</h3>
                <p>A small river named Duden flows by their place and supplies.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section> -->
				
		<section class="ftco-section bg-light">
		
			<div class="container">
				<?php
				$qv="SELECT * FROM `video`";
				$rv=mysqli_query($dbc,$qv);
				$rowv=mysqli_fetch_assoc($rv);
				$url=$rowv['url'];
				$new_url = str_replace('watch?v=', 'embed/', $url);
				?>
			<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="<?= $new_url ?>" allowfullscreen></iframe>
			</div><br>

				<div class="row">
					<div class="col-lg-9 pr-lg-5">
						<div class="row justify-content-center pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Traineeship</span>
		            <h2 class="mb-4">Offres d'emploi</h2>
		          </div>
		        </div>
						<div class="row">
						<!-- ---------- -->
								<?php
								  $q3="SELECT * FROM `offre` where archived=0 limit 8";
								  $r3=mysqli_query($dbc,$q3);
								  while($row3=mysqli_fetch_assoc($r3)){
									  $e_id=$row3['id_entreprise'];

									$q="SELECT * FROM `entreprise` where id='$e_id'";
									$r=mysqli_query($dbc,$q);
									$row=mysqli_fetch_assoc($r);
								?>
							<div class="col-md-12 ftco-animate">
		            <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
		              <div class="one-third mb-4 mb-md-0">
		                <div class="job-post-item-header align-items-center">
		                	<span class="subadge"><?= $row['denomination'] ?></span>
		                  <h2 class="mr-3 text-black">
							  <?php
							  if(!isset($_SESSION['admin_id']) and !isset($_SESSION['client_id']) and !isset($_SESSION['entreprise_id'])){
							  ?>
						  <a href="login_client.php"><?= $row3['title'] ?></a>
								  <?php }else{ ?>
								  <a href="dt_off.php?id=<?= $row3['id'] ?>"><?= $row3['title'] ?></a>
								  <?php } ?>
						</h2>
		                </div>
		                <div class="job-post-item-body d-block d-md-flex">
		                  <div class="mr-3"><b>Siege social :</b> <?= $row['siege_social'] ?></div>
		                  <div class="mr-3"><b>Numéro téléphone :</b> <?= $row['phone'] ?></div>
		                </div>
		              </div>

		              <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
						
						<?php
							  if(!isset($_SESSION['admin_id']) and !isset($_SESSION['client_id']) and !isset($_SESSION['entreprise_id'])){
							  ?>
						  <a href="login_client.php" class="btn btn-primary py-2">Postuler</a>
								  <?php }else{ ?>
									<a href="dmd_off.php?off_id=<?= $row3['id'] ?>" class="btn btn-primary py-2">Postuler</a>
								  <?php } ?>
		              </div>
		            </div>
				  </div>
					<?php } ?>

				  
		        </div>
		      </div>
		      <div class="col-lg-3 sidebar">
		        <div class="row justify-content-center pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		            <h2 class="mb-4">Entreprises</h2>
		          </div>
				</div>
				<?php
				$q="SELECT * FROM `entreprise` where isEmailConfirmed=1 and archived=0 ORDER BY id DESC limit 4";
				$r=mysqli_query($dbc,$q);
				while($row=mysqli_fetch_assoc($r)){
					//echo $row['denomination'];exit();
				?>
				
		        <div class="sidebar-box ftco-animate">
		        	<div class="">
			        	<a href="profil_entreprise.php?id=<?= $row['id'] ?>" class="company-wrap">
							<img src="<?= $row['img'] ?>" class="img-fluid" alt="Colorlib Free Template">
						</a>
						<h5 class="text-center">
						<a href="profil_entreprise.php?id=<?= $row['id'] ?>">
							<?= $row['denomination']?>
						</a>
						</h5>
			        	<!-- <div class="text p-3">
							<p>
								<span><?php $row['denomination']?></span>
								<span><?php $row['denomination']?></span>
							</p>
						</div> -->
		        	</div>
				</div>
				<?php } ?>
		      </div>
				</div>
			</div>
		</section>



    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-4">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Traineeship</span>
            <h2 class="mb-4">Clients satisfaits</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
				<?php
				$qfb="SELECT * FROM `feedback` where archived=0";
				$rfb=mysqli_query($dbc,$qfb);
				$num=mysqli_num_rows($rfb);
				//echo "<h1>".$num."</h1>";exit();
				while($rowfb=mysqli_fetch_assoc($rfb)){
				?>
              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="text">
                    <p class="mb-4"><?= $rowfb['feedback'] ?></p>
                    <div class="d-flex align-items-center">
                    	<div class="user-img" style="background-image: url(<?= $rowfb['img'] ?>)"></div>
                    	<div class="pl-3">
		                    <p class="name"><?= $rowfb['fullname'] ?></p>
		                    <span class="position"><?= $rowfb['job'] ?></span>
		                  </div>
	                  </div>
                  </div>
                </div>
			  </div>
				<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-candidates bg-primary">
    	<div class="container">
    		<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
          	<span class="subheading">Traineeship</span>
            <h2 class="mb-4">Notre équipe</h2>
          </div>
        </div>
    	</div>
    	<div class="container">
        <div class="row">
        	<div class="col-md-12 ftco-animate">
        		<div class="carousel-candidates owl-carousel">
        			<div class="item">
		        		<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/1.jpeg);"></div>
		        			<h2>Mohammed EL Mehdi BELKEDAR</h2>
		        			<span class="position">Étudiant en sciences pour l'ingénieur à Aix Marseille université</span>
		        		</a>
        			</div>
        			<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/2.jpg);"></div>
		        			<h2>Malab Jallil</h2>
		        			<span class="position">étudiant en 2ème année lycée</span>
		        		</a>
	        		</div>
	        		<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/3.jpg);"></div>
		        			<h2>Senad Hiba</h2>
		        			<span class="position">étudiante 1 ere année cycle ingénieur système embarqué</span>
		        		</a>
	        		</div>
	        		<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/4.jpg);"></div>
		        			<h2>Kaouz Nour</h2>
		        			<span class="position">étudiante 1 ere année cycle ingénieur système</span>
		        		</a>
	        		</div>
	        		<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/5.jpg);"></div>
		        			<h2>Afounas Lylia</h2>
		        			<span class="position">étudiante en 2ème année cycle ingénieur analyse des matériaux</span>
		        		</a>
	        		</div>
	        		<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/6.jpg);"></div>
		        			<h2>Belgacemi Sofiane</h2>
		        			<span class="position">étudiant en master 1 audit et contrôle de gestion</span>
		        		</a>
	        		</div>
					<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/7.jpg);"></div>
		        			<h2>Laouar Imene</h2>
		        			<span class="position">1ère année cycle ingénieur électronique</span>
		        		</a>
	        		</div>
					<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/8.jpg);"></div>
		        			<h2>KADOUR CHIKH Faiza</h2>
		        			<span class="position">étudiante en master 1 langue allemande</span>
		        		</a>
	        		</div>
					<div class="item">
	        			<a href="#" class="team text-center">
		        			<div class="img" style="background-image: url(images/9.jpg);"></div>
		        			<h2>Adib Mehdi</h2>
		        			<span class="position">étudiant en ère année cycle ingénieur maintenance industriel</span>
		        		</a>
	        		</div>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <!-- <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Our Blog</span>
            <h2><span>Recent</span> Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">August 28, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">August 28, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">August 28, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
              </a>
              <div class="text mt-3">
              	<div class="meta mb-2">
                  <div><a href="#">August 28, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
		
		<!-- <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    

	<?php
    include 'footer_index.html';
  ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="xjs/jquery.min.js"></script>
  <script src="xjs/jquery-migrate-3.0.1.min.js"></script>
  <script src="xjs/popper.min.js"></script>
  <script src="xjs/bootstrap.min.js"></script>
  <script src="xjs/jquery.easing.1.3.js"></script>
  <script src="xjs/jquery.waypoints.min.js"></script>
  <script src="xjs/jquery.stellar.min.js"></script>
  <script src="xjs/owl.carousel.min.js"></script>
  <script src="xjs/jquery.magnific-popup.min.js"></script>
  <script src="xjs/aos.js"></script>
  <script src="xjs/jquery.animateNumber.min.js"></script>
  <script src="xjs/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="xjs/google-map.js"></script>
  <script src="xjs/main.js"></script>
    
  </body>
</html>