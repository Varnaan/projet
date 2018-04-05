<?php
// Script php de création de la base de données accounts et de la table users
//Connection variables
$host = '127.0.0.1:3306';  //127.0.0.1:3306 pour Linux
$user = 'root';
$password = 'vincent1994';
//Create mysql connection
$mysqli = new mysqli($host, $user, $password);
if ($mysqli->connect_errno) {
    //echo "Erreur de connexion !!!!";
    echo "<h1>Error: Unable to connect to MySQL.</h1>" . PHP_EOL . "<br />";
    echo "<h1>Debugging errno: </h1>" . mysqli_connect_errno() . PHP_EOL . "<br />";
    echo "<h1>Debugging error: </h1>" . mysqli_connect_error() . PHP_EOL . "<br />";
    die();
}
//Créer la base de donnée
if (!$mysqli->query('CREATE DATABASE projet')) {
    printf("Errormessage: %s\n", $mysqli->error);
}
//On va créer les nouvelles tables bans la base
$mysqli->query('
CREATE TABLE `projet`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

$mysqli->query('
CREATE TABLE `projet`.`messages` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `auteur` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT Anonymous,
    `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `contenu` text CHARACTER SET utf8 NOT NULL,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>