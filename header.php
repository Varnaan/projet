<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse" style="opacity: 0.8;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Project</a>
    </div>
    <?php
    if (isset($_SESSION['email'])) {
      echo '
      <ul class="nav navbar-nav">
      <li class="active"><a href="chatbox.php">Chatbox</a></li>
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
