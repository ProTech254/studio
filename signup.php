
<?php
  if(isset($_SESSION['user'])){
    header('location: index.php');
  }
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Sign Up Page</title>
	  <!-- Main css -->
    <link rel="stylesheet" type="text/css" href="css/shopstyle.css" />
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="css/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="css/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>
<body class="hold-transition register-page">


	<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p>
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p>
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg">Register a new membership</p>

    	<form action="AddNewCustomer.php" method="POST">

		      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="email" placeholder="Username or Email" value="<?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : '' ?>" required>
        	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" placeholder="Full names" value="<?php echo (isset($_SESSION['name'])) ? $_SESSION['name'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>


          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php">I already have a membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>


</body>
</html>
