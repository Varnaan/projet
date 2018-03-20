<?php 
session_start();   //starts session
session_unset(); // Frees all session variables.
session_destroy(); // Destroys all data registered to a session
header('Location: ../login.php'); //redirects to login
exit();
?>