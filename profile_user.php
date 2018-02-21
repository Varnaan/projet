<?php
session_start();
// $_SESSION['message'] = '';
require 'header.php';
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile_user.css">
    <title>Document</title>
</head>
<body>
<h1>Welcome <?= $_SESSION['username'] ?></h1>
<button data-toggle="collapse" data-target="#update">Change account information</button>
<div id="update" class="collapse">
    <form action="">
        <input type="text" placeholder="New User Name" name="username" class='field'  required /><br>
		<input type="email" placeholder="New Email" name="email" class='field'  required /><br>
        <input type="password" placeholder="New Password" name="password" autocomplete="new-password" class='field' required /><br>
		<input type="password" placeholder="Confirm New Password" name="confirmpassword" autocomplete="new-password" class='field' required /><br>
	    <input type="submit" value="Update my Info" name="submit" class="" />
    </form>
</div> 
<button data-toggle="collapse" data-target="#heaven">le paradis</button>
<div id="heaven" class="collapse">
    <img src="images/luke.jpg" alt="">
</div>
</body>
</html>