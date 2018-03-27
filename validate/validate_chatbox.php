
<?php
session_start()

?>
<body class="action">
	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="merci">
	</div>
	<title>Yotsu谢谢</title>
	<?php
	$auteur = $_POST["auteur"];
	$contenu = $_POST["contenu"];
	$nom_serv ="localhost";
	$nom_base ="projet";
	$identifiant ="root";
	$mot_de_passe ="vincent1994";
	if ($auteur == "" || $contenu == "") {
		echo "username and/or content field cannot be empty";
	}
	else{
		echo "Message envoyé !";
		try{
			$connexion = new PDO("mysql:host=$nom_serv;dbname=$nom_base",
								$identifiant,
								$mot_de_passe);		
			$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$req= "INSERT INTO messages (auteur, contenu)
							VALUES('$auteur','$contenu')";

			$connexion->exec($req);		
		}
		catch (PDOException $e) {
			echo "Echec de connexion et d'enregistrement: " . $e-> 
				getMessage();
		}
	}
	header("refresh:1; url=../chatbox.php");
	 ?>
	 </body>