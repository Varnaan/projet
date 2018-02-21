<?php
define('DBHOST', '127.0.0.1:3306');
define('DBUSER', 'root');
define('DBPASS', 'vincent1994');
define('DBNAME', 'projet');

$mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

if ($mysqli->connect_errno) {
	echo "<h1>Error: Unable to connect to MySQL.</h1>" . PHP_EOL . "</br>";
	echo "<h1>Debugging errno: </h1>" . mysqli_connect_errno() . PHP_EOL . "</br>";
	echo "<h1>Debugging error: </h1>" . mysqli_connect_error() . PHP_EOL . "</br>";
    die();
} else {
}
?>