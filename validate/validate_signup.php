<?php
// checks request method, if 'POST' carries on
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
	// checks if form was properly submitted
	if (isset($_POST['submit'])) {
		// escapes strings to protect against SQL injections
		$email = $mysqli->escape_string($_POST['email']);
		$username = $mysqli->escape_string($_POST['username']);
		// sets up requests and checks in database
		$result1 = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
		$result2 = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
		/*$result->fetch_assoc();*/
		/*checks all database fields before insertion*/
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
		} else {//generic alert if mistake is made
			echo '<script language="javascript">';
			echo 'alert("Email or Username already in use or Password incorrect please try again.")';
			echo '</script>';
		}
		if ($mysqli->query($sql) == true) {
			$_SESSION['message'] = "Registration successful ! Added $username to the database !";
			header("location: ./chatbox.php");
		} else {
			$_SESSION['message'] = "User could not be added to the database !";
		}
		$mysqli->close();
	}
}
?>