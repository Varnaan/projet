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
	<title>Yotsublog</title>
</head>
<audio></audio>
<body>
	<link rel="stylesheet" type="text/css" href="css/chatbox.css">
	<div>
		<div>
			<fieldset class="outCom">
			<legend><h2> Hello <?= $_SESSION['username'] ?></h2></legend>
			<?php
    $auteur = $_POST["auteur"];
    $contenu = $_POST["contenu"];
    $nom_serv = "localhost";
    $nom_base = "blog";
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
    $response = $connexion->query('SELECT * FROM commentaires');
    $response->execute();
    while ($donnees = $response->fetch()) {
        $date = $donnees['date'];
        $datej = date('d M', strtotime($date));
        $dateh = date('H:i:s', strtotime($date));

        // echo $_SESSION['username'] == $donnees['auteur'];
        if ( $_SESSION['username'] == $donnees['auteur'] ) {
            echo "<div class='msg' style='text-align:right'><legend>posted by " . htmlspecialchars($donnees['auteur']) . ' ' . 'le ' . $datej . ' à ' . $dateh . '</legend>' . '<p>' . htmlspecialchars($donnees['contenu']) . '</p></div>';
        } else {
            echo '<div  class="msg" "><legend>posted by ' . htmlspecialchars($donnees['auteur']) . ' ' . 'le ' . $datej . ' à ' . $dateh . '</legend>' . '<p>' . htmlspecialchars($donnees['contenu']) . '</p></div>';
        }
    }
    ?>
    </div>
	 			</div>
	 		</div>
<footer>
		<form  action="validate/validate_chatbox.php" method="POST">
			<input type="text" name="auteur" value="<?= $_SESSION['username']?>"  readonly><br>
			<textarea rows="2" cols="50" placeholder="评论。。。。。。" name = "contenu"></textarea>
			<input type="submit" name="submit" value="发送">
        </form>
</footer>
	</div>
</body>
</html>