

<?php
include 'includes/session.php';

if(isset($_POST['signup'])){

	$name = $_POST['name'];
	$username = $_POST['username'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];


	$_SESSION['name'] = $name;
	$_SESSION['username'] = $username;

	if($password != $repassword){
		$_SESSION['error'] = 'Passwords did not match';
		header('location: signup.php');
	}
	else{
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
		$stmt->execute(['username'=>$username]);
		$row = $stmt->fetch();
		if($row['numrows'] > 0){
			$_SESSION['error'] = 'username already taken';
			header('location: signup.php');
		}
		else{
			$now = date('Y-m-d');
			$password = password_hash($password, PASSWORD_DEFAULT);

			//generate code

			try{
				$stmt = $conn->prepare("INSERT INTO users (username, password, name, contact, address) VALUES (:username, :password, :name, :contact, :address)");
				$stmt->execute(['username'=>$username, 'password'=>$password, 'address'=>$address, 'contact'=>$contact, 'name'=>$name]);
				$userid = $conn->lastInsertId();

				header('location: login.php');

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				header('location: signup.php');
			}

			$pdo->close();

		}

	}

}
else{
	$_SESSION['error'] = 'Fill up signup form first';
	header('location: signup.php');
}

?>
