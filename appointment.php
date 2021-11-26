<?php
session_start();
include ('db_connect.php');
$doctor= $connect->query("SELECT * FROM designers_list ");
	while($row = $doctor->fetch_assoc()){
		$doc_arr[$row['id']] = $row;
	}
	$patient= $connect->query("SELECT * FROM users where type = 3 ");
	while($row = $patient->fetch_assoc()){
		$p_arr[$row['id']] = $row;
	}
	if(isset($_GET['id'])){
	$qry = $connect->query("SELECT * FROM appointment_list where id =".$_GET['id']);
	foreach ($qry->fetch_array() as $key => $value) {
		$$key = $value;
	}

	}

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

  <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

        <script src="admin/assets/vendor/jquery/jquery.min.js"></script>
        <script src="admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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

                <li class="nav-item"><a href="booking.php" class="nav-link">Our Designers</a></li>

				<li class="nav-item"><a href="appointment.php" class="nav-link">Booking Consultation</a></li>

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

        <center>
        <main id="main" class=" bg-dark" style="padding:50px">
  		<div id="login-left">

  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">

  					<form id="login-form" action="setappointment.php" method="POST">
  						<div class="form-group">
  							<label for="username" class="control-label">Full Names</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>

                          <div class="form-group">
                             <label for="" class="control-label">Name of the Designe</label>
                                <select class="browser-default custom-select select2" name="doctor_id">
                                    <option value=""></option>
                                    <?php foreach($doc_arr as $row): ?>
                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($doctor_id) && $doctor_id == $row['id'] ? 'selected' : '' ?>><?php echo "D.s ".$row['name'].', '.$row['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                             </div>

                             <div class="form-group">
                                <label for="" class="control-label">Date</label>
                                <input type="date"  name="date" class="form-control" value="<?php echo isset($schedule) ? date("Y-m-d",strtotime($schedule)) : '' ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label">Time</label>
                                <input type="time"  name="time" class="form-control" value="<?php echo isset($schedule) ? date("H:i",strtotime($schedule)) : '' ?>" required>
                            </div>
                          <div class="form-group">
								<label for="" class="control-label">Add Image</label>
								<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
							</div>

  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Book an Appointment</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
  </main>
        </center>




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



        <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
