
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

			<li class="nav-item"><a href="image.php" class="nav-link"> Add Post</a></li>

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

	   </div>


     <section class="page-section" id="designers" style="padding-top:20px">
        <div class="container">
        	<div class="card">
        		<div class="card-body">
        			<div class="col-lg-12">
						<?php if(isset($_GET['sid']) && $_GET['sid'] > 0): ?>
						<div class="row">
							<div class="col-md-12 text-center">
								<?php
								$s = $connect->query("SELECT * from design_specialty where id = ".$_GET['sid'])->fetch_array()['name'];
								?>
								<h2><b>Designers/'s who are in titled as <?php echo $s ?></b></h2>
							</div>
						</div>
						<hr class="divider">
						<?php endif; ?>
				<?php
				$where = "";
				if(isset($_GET['sid']) && $_GET['sid'] > 0)
				$where = " where  (REPLACE(REPLACE(REPLACE(specialty_ids,',','\",\"'),'[','[\"'),']','\"]')) LIKE '%\"".$_GET['sid']."\"%' ";
				$cats = $connect->query("SELECT * FROM designers_list ".$where." order by id asc");
				while($row=$cats->fetch_assoc()):
				?>
				<div class="row align-items-center">
					<div class="col-md-3">
						<img src="<?php echo $row['img_path'] ?>" alt="">
					</div>
					<div class="col-md-6">
						 <p>Name: <b><?php echo "".$row['name'] ?></b></p>
						 <p><small>Email: <b><?php echo $row['email'] ?></b></small></p>
						 <p><small>Address: <b><?php echo $row['clinic_address'] ?></b></small></p>
						 <p><small>Contact #: <b><?php echo $row['contact'] ?></b></small></p>
						 <p><small><a href="javascript:void(0)" class="view_schedule" data-id="<?php echo $row['id'] ?>" data-name="<?php echo "Dr. ".$row['name'].', '.$row['name_pref'] ?>"><i class='fa fa-calendar'></i> Schedule</a></b></small></p>
						 <p><b>Specialties:</b></p>

						 <div>
						 	<?php if(!empty($row['specialty_ids'])): ?>
						 	<?php
						 	foreach(explode(",", str_replace(array("[","]"),"",$row['specialty_ids'])) as $k => $val):
						 	?>
						 	<span class="badge badge-light" style="padding: 10px"><large><b><?php echo $ms_arr[$val] ?></b></large></span>
						 	<?php endforeach; ?>
						 	<?php endif; ?>
						 </div>
					</div>
					<div class="col-md-3 text-center align-self-end-sm">
          <a  class="btn-outline-primary  btn  mb-4 set_appointment" href="appointment.php">Set Appointment</a>
					</div>
				</div>
				<hr class="divider" style="max-width: 60vw">
				<?php endwhile; ?>
				</div>
				</div>
        	</div>
        </div>
    </section>



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

    <style>
    	#designers img{
    		max-height: 300px;
    		max-width: 200px;
    	}
    </style>
    <script>

       $('.view_schedule').click(function(){
			uni_modal($(this).attr('data-name')+" - Schedule","view_designer_schedule.php?id="+$(this).attr('data-id'))
		})
       $('.set_appointment').click(function(){
       	if('<?php echo isset($_SESSION['login_id']) ?>' == 1)
			uni_modal("Set Appointment with "+$(this).attr('data-name'),"set_appointment.php?id="+$(this).attr('data-id'),'mid-large')
		else{
			uni_modal("Login First","login.php")
		}
		})
    </script>

<style>
   .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
 </style>
 <script>
 	$('.datepicker').datepicker({
 		format:"yyyy-mm-dd"
 	})
 	 window.start_load = function(){
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function(){
    $('#preloader2').fadeOut('fast', function() {
        $(this).remove();
      })
  }

 	window.uni_modal = function($title = '' , $url='',$size=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal .modal-title').html($title)
                $('#uni_modal .modal-body').html(resp)
                if($size != ''){
                    $('#uni_modal .modal-dialog').addClass($size)
                }else{
                    $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
                }
                $('#uni_modal').modal('show')
                end_load()
            }
        }
    })
}
  window.uni_modal_right = function($title = '' , $url=''){
    start_load()
    $.ajax({
        url:$url,
        error:err=>{
            console.log()
            alert("An error occured")
        },
        success:function(resp){
            if(resp){
                $('#uni_modal_right .modal-title').html($title)
                $('#uni_modal_right .modal-body').html(resp)

                $('#uni_modal_right').modal('show')
                end_load()
            }
        }
    })
}
window.alert_toast= function($msg = 'TEST',$bg = 'success'){
      $('#alert_toast').removeClass('bg-success')
      $('#alert_toast').removeClass('bg-danger')
      $('#alert_toast').removeClass('bg-info')
      $('#alert_toast').removeClass('bg-warning')

    if($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({delay:3000}).toast('show');
  }
  window.load_cart = function(){
    $.ajax({
      url:'admin/ajax.php?action=get_cart_count',
      success:function(resp){
        if(resp > -1){
          resp = resp > 0 ? resp : 0;
          $('.item_count').html(resp)
        }
      }
    })
  }
  $('#login_now').click(function(){
    uni_modal("LOGIN",'login.php')
  })
  $(document).ready(function(){
    load_cart()
  })
 </script>
        <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
