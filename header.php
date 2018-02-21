<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="node_modules/mdbootstrap/css/mdb.css">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background: url('images/bg.jpg') no-repeat center fixed; -webkit-background-size: cover; background-size: cover;">
<nav class="navbar navbar-inverse" style="opacity: 0.8;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Project</a>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
      echo '
      <ul class="nav navbar-nav">
      <li class="active"><a href="profile_user.php">Profile</a></li>
      </ul>
      ';
      echo '
        <ul class="nav navbar-nav navbar-right">
          <li><a href="validate/validate_logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
        </ul>
        ';
    } else {
      echo '
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        ';
    }
    ?>
  </div>
</nav>
</body>
</html>
