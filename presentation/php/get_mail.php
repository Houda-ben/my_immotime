	<?php
	require_once("function.php");
	session_start();
	include 'connection.php';
	$estConnecte = estConnecte();

	if (isset($_POST['sign_in']))
	{
		if(isset($_POST['login_email']) 
			&& isset($_POST['login_password']))
		{

			$email = $_POST['login_email'];
			$password = $_POST['login_password'];
			//echo $email;
			//echo $password;
			$requet = $bdd->prepare('SELECT id, nom, prenom FROM personne WHERE mail="'.$email.'"and mdp = "'.$password.'";');
			$res = $requet->execute();
			if ($row = $requet->fetch()) 
			{
				$id = $row['id'];
				$nom = $row['nom'];
				$prenom = $row['prenom'];
				connecter($id,$nom,$prenom);
				include ("../accueil.html");
			}
			else
			{
				$url = "../index.php";
				echo '<script>window.location = "'.$url.'";</script>';
			}

		} 
	}
	?>