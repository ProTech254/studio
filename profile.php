
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
        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="signup.php" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="booking.php" class="nav-link">Booking Consultation</a></li>
                  <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
           <li class="nav-item"><a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>"class="nav-link">Log Out</a></li>
      </ul>
    </div>


  </div>
</nav>

	   </div>
<div class="form_wrapper" >
<section class="form update">
<form name="profile" action="#" style="margin-left: 20px" method="POST">
<h1><b>BOOK APPOINTMENT</b></h1>
  <div class="error-text"></div>
 <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" name="first_name" style="width:20em;" placeholder="Enter your first name" required value="<?php echo $row['first_name']; ?>" />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" name="last_name" style="width:20em;" placeholder="Enter your last name" required value="<?php echo $row['last_name']; ?>">
          </div>
          <div class="form-group">
            <label>Date</label>
            <input type="text" class="form-control" name="date" style="width:20em;" placeholder="Enter a valid date" required >
          </div>

  <div class="field button w-25 p-3">
          <input class="btn btn-primary btn-block" type="submit" name="submit" value="UPDATE">
        </div>
</form>
</section>
</div>
</body>
</html>
<?php
 if(isset($_POST['submit'])){
        $firstName = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
      $query = "UPDATE users SET first_name = '$firstName',
                      last_name = '$last_name', email = '$email'
                      WHERE user_id = '{$_SESSION['user_id']}'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Profile update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }              
?>