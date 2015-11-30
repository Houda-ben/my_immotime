<?php

	include 'connection.php';
	if(
		isset($_POST['nom']) && 
		isset($_POST['prenom'] ) && 
		isset($_POST['codepostal'] ) &&
		isset($_POST['ville']) &&
		isset($_POST['sit_fam']) && 
		isset($_POST['statut']) &&
		isset($_POST['child_nbr']) &&
		isset($_POST['telephone']) &&
		isset($_POST['email']) &&
		isset($_POST['mdp']) &&
		isset($_POST['mdp2']) 
		){ 
			$nom = $_POST['nom']; 
			$prenom = $_POST['prenom'];
			$cp = $_POST['codepostal'];
			$ville = $_POST['ville'];
			$situation = $_POST['sit_fam'] ;
			$statut = $_POST['statut'] ;
			$enfants = $_POST['child_nbr'] ;
			$tel = $_POST['telephone'] ;
			$mail = $_POST['email'] ;
			$mdp = $_POST['mdp'] ;
			$mdp2 = $_POST['mdp2'] ;

		$req = $bdd->prepare('INSERT INTO personne (id, nom, prenom, 
		cp, ville, sit_am, statut, nbr_enf, mail, tel, endroit, connexion, mdp)
		VALUES ("", "'.$nom.'", "'.$prenom.'", "'.$cp.'", "'.$ville.'", "'.$situation.'", "'.$statut.'",
		"'.$enfants.'", "'.$mail.'", "'.$tel.'", "", "", "'.$mdp.'")');
		
		//$message = 'mdp inccorecte';

		if ($mdp != $mdp2) {
			echo "mot de passe incorrect";
			include ("formulaire.html");
		}else {
			$req -> execute();
			$url = "../index.php";
			echo '<script>window.location = "'.$url.'";</script>';
		}
	}
?>