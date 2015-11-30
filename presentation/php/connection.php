<?php 
	try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=myimmotime', 'root', 'root');
			}
			catch (Exception $e)
			{
					 die('Erreur :'.$e->getMessage('Echec: Connection à la base de données '));
			}
?> 