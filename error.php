<?php
session_start();
require 'header.php';
header("refresh:4; url=login.php");
if(!isset($_SESSION['userId']))
{
    // not logged in
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div style="display: flex; justify-content: space-around; padding: 100px;">
    <img src="images/err.jpg" style="align-self: center;"> 
</div>
</body>
</html>
