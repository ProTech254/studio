<?php
	include 'includes/session.php';

	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$details = $_POST['details'];
		$ing = $_FILES['photo']['name'];

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM designs WHERE title=:title");
		$stmt->execute(['slug'=>$slug]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Design Already Exists';
		}
		else{
			if(!empty($img)){
				$ext = pathinfo($img, PATHINFO_EXTENSION);
				$new_filename = $slug.'.'.$ext;
				move_uploaded_file($_FILES['photo']['tmp_name'], 'assets/img/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO designs (title, details, img) VALUES (:title, :details, :img)");
				$stmt->execute(['title'=>$title, 'details'=>$details, 'img'=>$new_filename]);
				$_SESSION['success'] = 'Design successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill All Details First';
	}

	header('location: image.php');

?>