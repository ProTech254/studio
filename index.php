<?php include 'db_connect.php'; 

	$special = $connect->query("SELECT * FROM design_specialty");
	$ms_arr = array();
	while ($row=$special->fetch_assoc()) {
		$ms_arr[$row['id']] = $row['name'];
	}

	include 'includes/session.php';
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Moskofyan | Design and Advert Studio</title>
	<link rel="shortcut icon" href="img/logo_fav.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Header -->

<section class="header">

	<div class="logo mx-auto">
		<a href="index.php"><img src="img/logo.png" alt="moskofyan design logo"></a>
	</div>
	<div class="phone">
		<a href="tel:+359899577555">Call Us at 999-555-5</a>
	</div>

</section>

<!-- Navigation -->

<section id="nav-bar">

<nav class="navbar bg-dark navbar-dark navbar-expand-lg">
	<div class="container">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
				
				<li class="nav-item"><a href="booking.php" class="nav-link">Booking Consultation</a></li>

				<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>

			

			
			<?php
            if(isset($_SESSION['user'])){
           
              echo '
			  <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Welcome, '.$user['username'].'</a></li> 
				<li class="nav-item"><a class="nav-link js-scroll-trigger" href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
				
              ';
            }
            else{
              echo '
			  <li class="nav-item"><a href="signup.php" class="nav-link">Registration</a></li>

			  <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
              ';
            }
          ?>
			</ul>
		</div>


	</div>
</nav>

</section>

<!--- Image Slider -->

<div id="slides" class="carousel slide" data-ride="carousel" data-interval="6000">
	<ul class="carousel-indicators">

		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
		<li data-target="#slides" data-slide-to="3"></li>
		<li data-target="#slides" data-slide-to="4"></li>

	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="img/carousel1.jpg" alt="img1" class="w-100">
			<div class="carousel-caption">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-8 bg-custom  py-3 px-0">
							<h1>Exterior Design</h1>
							<div class="border-top border-primary w-50 mx-auto my-3"></div>
							<h3 class="pb-3">3D Visualizations</h3>
							<a href="#" class="btn btn-outline-light btn-lg">View More</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="img/carousel2.jpg" alt="img1" class="w-100">
			<div class="carousel-caption">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-sm-12 col-md-8 bg-custom  py-3 px-0">
							<h1>Interior Design</h1>
							<div class="border-top border-primary w-50 mx-auto my-3"></div>
							<h3 class="pb-3">Complete Design</h3>
							<a href="#" class="btn btn-outline-light btn-lg">View More</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="img/carousel4.jpg" alt="img1" class="w-100">
			<div class="carousel-caption">
				<div class="container">
					<div class="row justify-content-start">
						<div class="col-sm-12 col-md-8 bg-custom  py-3 px-0">
							
							
							<h3 class="pb-3">Preparation of Complete <br> Documentation</h3>
							<a href="#" class="btn btn-outline-light btn-lg">View More</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="img/carousel3.jpg" alt="img1" class="w-100">
			<div class="carousel-caption">
				<div class="container">
					<div class="row justify-content-start">
						<div class="col-sm-12 col-md-8 bg-custom  py-3 px-0">
							<h1>Profesional Work</h1>
							<div class="border-top border-primary w-50 mx-auto my-3"></div>
							<h3 class="pb-3">Complete Design</h3>
							<a href="#" class="btn btn-outline-light btn-lg">View More</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<div class="carousel-item">
			<img src="img/carousel5.jpg" alt="img1" class="w-100">
			<div class="carousel-caption">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-8 bg-custom  py-3 px-0">
							<h1>Our Teem</h1>
							
							<a href="#" class="btn btn-outline-light btn-lg">View More</a>
						</div>
					</div>
				
				</div>
			</div>
		</div>

	</div>

	<a href="#slides" class="carousel-control-prev" role="button" data-slide="prev">
		<span class="fas fa-chevron-left fa-2x"></span>
	</a>

	<a href="#slides" class="carousel-control-next" role="button" data-slide="next">
		<span class="fas fa-chevron-right fa-2x"></span>
	</a>

</div>

<!--- End Image Slider -->

<!--- Main Page  -->

<div class="col-12 text-center mt-5">
	<h1 class="text-dark pt-4 title">Architectural Design</h1>
	<p class="lead mt-4">Our sample work</p>
</div>

<!--- Three Column Section  -->

<div class="container test">
	<div class="row my-5">

				<?php 
				$where = "";
				if(isset($_GET['sid']) && $_GET['sid'] > 0)
				$where = " where  (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"".$_GET['sid']."\"%' ";
				$cats = $connect->query("SELECT * FROM designs ".$where." order by id asc");
				while($row=$cats->fetch_assoc()):
				?>
		<div class="col-md-4 my-4">
			<a href="#"><img src="<?php echo $row['img'] ?>" alt="" class="w-100"></a>
			
			 <h4 class="my-4"><?php echo $row['title'] ?></h4>
			<p class="lead"><?php echo $row['details'] ?></p>
			<a href="#" class="btn btn-outline-primary btn-md">To Gallery</a>
		</div>
		<?php endwhile; ?>
	



	</div>
</div>


<!--- Main Page 2  -->

<div class="col-12 text-center mt-5">
	<h1 class="text-dark pt-4 title">Advertising</h1>
	<p class="lead mt-4">Best advertising services</p>
</div>

<!--- Three Column Section 2 -->

<div class="container test">
	<div class="row my-5">
	<?php 
				$where = "";
				if(isset($_GET['sid']) && $_GET['sid'] > 0)
				$where = " where  (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"".$_GET['sid']."\"%' ";
				$cats = $connect->query("SELECT * FROM advertisement ".$where." order by id asc");
				while($row=$cats->fetch_assoc()):
				?>

		<div class="col-md-4 my-4">
			<a href="#"><img src="<?php echo $row['img'] ?>" alt="" class="w-100"></a>
			<h4 class="my-4"> <?php echo $row['title'] ?> </h4>
			<p class="lead"> <?php echo $row['details'] ?> </p>
			<a href="#" class="btn btn-outline-primary btn-md">To Gallery</a>
		
		</div>

		<?php endwhile; ?>



	</div>
</div>

<!--- Fixed background -->

<figure>
	<div class="fixed-wrap">
		<div id="fixed">

		</div>

	</div>
</figure>

<!--- Team  -->

<div class="col-12 text-center mt-5">
	<h1 class="text-dark pt-4 title">Meet the Team</h1>
</div>

<!--- Team three columns -->


<section class="team pb-5">

	<div class="row">
	<?php 
				$where = "";
				if(isset($_GET['sid']) && $_GET['sid'] > 0)
				$where = " where  (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"".$_GET['sid']."\"%' ";
				$cats = $connect->query("SELECT * FROM designers_list ".$where." order by id asc");
				while($row=$cats->fetch_assoc()):
				?>
		<div class="team-col">
			<img src="<?php echo $row['img_path'] ?>" alt="">
			<div class="layer">
				<a href=""><h3>  <?php echo $row['name'] ?>  </h3></a>
			</div>
		</div>

		<?php endwhile; ?>

	
	</div>
</section>

<!--- Two Column Section -->

<div class="container-fluid padding py-5">
	<div class="row padding">
		<div class="col-md-12 col-lg-6">
			<h2>Our Philosophy</h2>
			<p>Struggle to Achieve</p>
			<p>The sky is the limit.</p>
			<br>
	

		</div>
		<div class="col-lg-6">
			<img src="img/philo2.jpg" class="img-fluid" alt="">
		</div>

	</div>
	<hr class="my-4">
</div>


<!--- connectect -->

<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>connectect</h2>
		</div>
		<div class="col-12 social padding">
			<a href="#"><i class="fab fa-facebook"></i></a>
			<a href="#"><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-google-plus-g"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
</div>

<!--- Footer -->

<footer>
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<img src="img/logo_neg.png" alt="Logo">
				<hr class="light">
				<p>555-555-5555</p>
				<p>moskoy@moskofan.com</p>
				<p>100 Agwan Street</p>
				<p>Cpe, State, 000067</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Our Hours</h5>
				<hr class="light">
				<p>Monday:8-5</p>
				<p>Saturday:8-12</p>
				<p>Sunday: Closed</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Offices</h5>
				<hr class="light">
				<p>Cape, South Africa, 1234</p>
				<p>Mexico, Mexico, 0844</p>
				<p>Mexico, State, 4567</p>
				<p>City, State, 6743</p>
			</div>

			<div class="col-12">
				<hr class="light-100">
				<h5>&copy; moskofyan.com</h5>
			</div>
		</div>
	</div>
</footer>

</body>
</html>



