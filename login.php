<?php
session_start();
// $_SESSION['message'] = '';
require 'db.php';
require 'header.php';
require 'validate/validate_login.php';
// require 'validate_signup.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body>
	<div class="body-content">
  		<div class="module">
		    <h1>Log in</h1>
		    <form class="form" action="#" method="post">
		      <div class="alert alert-error"></div>
		      <input type="email" placeholder="Email" name="email_connect" class='field' required /><br>
		      <input type="password" placeholder="Password" name="password_connect" class='field' required /><br>
		      <input type="submit" value="Submit" name="submit" class="" /> 
		    </form>
  		</div>
	</div>
</body>
</html>