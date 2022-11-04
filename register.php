<!--script file for successfully registered alerts and page redirecting-->
<script type="text/javascript">
    function regisAlerts() {
		alert("Thank you for registering! Redirecting back to Sign In page....");
        window.location = "login.php"; // Redirecting to other page.
    }
</script>

<?php
	include 'includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;



		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //Validate email format
			$_SESSION['error'] = 'Wrong email format, please try again!';
			header('location: signup.php');
		}
		else if(strlen($password)<8){
			$_SESSION['error'] = 'Password too short!Must be at least 8 characters!';
			header('location: signup.php');
		}
		else{
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				$now = date('Y-m-d');
				$password = password_hash($password, PASSWORD_DEFAULT);


				$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, created_on) VALUES (:email, :password, :firstname, :lastname, :now)");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'now'=>$now]);
				$userid = $conn->lastInsertId();

				echo '<script type="text/javascript">regisAlerts()</script>';

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>
