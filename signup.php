<?php
session_start();
// $_SESSION['message'] = '';
require 'db.php';
require 'header.php';
require 'validate/validate_signup.php';
// require 'validate_login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
	<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="css/signup.css" type="text/css">
</head>
<body>
	<div class="body-content">
  		<div class="module">
		    <h1>Sign-up</h1>
		    <form class="form" action="signup.php" method="POST" enctype="multipart/form-data" autocomplete="on">
		      <div class="alert alert-error"></div>
		      <input type="text" placeholder="User Name" name="username" class='field'  required /><br>
		      <input type="email" placeholder="Email" name="email" class='field'  required /><br>
		      <input type="password" placeholder="Password" name="password" autocomplete="new-password" class='field' required /><br>
		      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" class='field' required /><br>
		      <input type="submit" value="Create my account" name="submit" class="" />
		    </form>
  		</div>
	</div>
</body>
</html>