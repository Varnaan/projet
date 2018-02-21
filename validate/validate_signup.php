<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['submit'])) {
		$email = $mysqli->escape_string($_POST['email']);
		$username = $mysqli->escape_string($_POST['username']);
		$result1 = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
		$result2 = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
		/*$result->fetch_assoc();*/
		if ($result1->num_rows == 0 && $result2->num_rows == 0 && $_POST['password'] == $_POST['confirmpassword']) {
			$username = $mysqli->real_escape_string($_POST['username']);
			$email = $mysqli->real_escape_string($_POST['email']);
			$pwd = $mysqli->real_escape_string($_POST['password']);
			$password = password_hash($pwd, PASSWORD_DEFAULT);
			$_SESSION['username'] = $username;
			echo $username;
			$_SESSION['email'] = $email;
			$sql = "INSERT INTO users (username, email, password) 
					VALUES ('$username', '$email', '$password')";
		} else {
			echo '<script language="javascript">';
			echo 'alert("Email or Username already in use or Password incorrect please try again.")';
			echo '</script>';
		}
		if ($mysqli->query($sql) == true) {
			$_SESSION['message'] = "Registration successful ! Added $username to the database !";
			header("location: ./profile_user.php");
		} else {
			$_SESSION['message'] = "User could not be added to the database !";
		}
		$mysqli->close();
	}
}
?>