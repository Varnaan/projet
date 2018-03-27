<?php
session_start();
// $_SESSION['message'] = '';
require 'header.php';
require 'db.php';
// if the username is not set, sends back to login.php
if (!isset($_SESSION['username'])) {
    // not logged in
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
	<title>Wall</title>
</head>
<audio></audio>
<body>
	<link rel="stylesheet" type="text/css" href="css/chatbox.css">
	<div>
		<div>
			<fieldset class="outCom">
			<?php
    $auteur = $_POST["auteur"];
    $contenu = $_POST["contenu"];
    $nom_serv = "localhost";
    $nom_base = "projet";
    $identifiant = "root";
    $mot_de_passe = "vincent1994";
    ?>
				<div class="container">
                    <div class="chat">
			<?php

    try {
        $connexion = new PDO(
            "mysql:host=$nom_serv;dbname=$nom_base",
            $identifiant,
            $mot_de_passe
        );
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Echec de connexion et d'enregistrement: " . $e->getMessage();
    }
    $response = $connexion->query('SELECT * FROM messages');
    $response->execute();
    while ($donnees = $response->fetch()) {
        $date = $donnees['date'];
        $datej = date('d M', strtotime($date));
        $dateh = date('H:i:s', strtotime($date));

        if ( $_SESSION['username'] == $donnees['auteur'] ) {
            echo "<div  class='msg' style='text-align:right'>" .
            '<h3>' . htmlspecialchars($donnees['auteur']) . ' ' . 'le ' . $datej . ' à ' . $dateh . '' . 
            '</"h3">' . '<br>' . "<span id='speech-bubble-own'>" . htmlspecialchars($donnees['contenu']) . 
            '</span></div>';
        } else {
            echo "<div  class='msg' style='text-align:left'>" .
            '<h3>' . htmlspecialchars($donnees['auteur']) . ' ' . 'le ' . $datej . ' à ' . $dateh . '' . 
            '</"h3">' . '<br>' . "<span id='speech-bubble-other'>" . htmlspecialchars($donnees['contenu']) . 
            '</span></div>';
        }
    }
    ?>
    </div>
	 			</div>
	 		</div>
<footer class="wrapper">
		<form  action="validate/validate_chatbox.php" method="POST">
			<input type="hidden" name="auteur" value="<?= $_SESSION['username']?>"  readonly><br>
			<textarea class="one" rows="2" cols="50" placeholder="评论。。。。。。" name = "contenu"></textarea>
			<input class="four" type="submit" name="submit" value="Send">
        </form>
</footer>
	</div>
</body>
</html>