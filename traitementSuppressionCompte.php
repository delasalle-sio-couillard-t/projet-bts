<?php 
	/* ouverture d'une session */
	// cette instruction doit toujours être la première ligne du code pour fonctionner!!!!!!!!!!!!!
	session_start();	
	
	//inclusion du menu
	include('include/menu.php'); 
		
	//inclusion du header
	include('include/head.php');
		
	// inclusion des paramètres et de la bibliothéque de fonctions ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_parametres.php');
	// connexion du serveur web à la base MySQL ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_connexion.php');

?>

<?php
    $mdp = $_SESSION['password'];
	$adrMail = $_SESSION['adrMail'];
	// préparer requete changement mdp bdd
	
	if ( empty ($_POST ["mdpActuel"]) == true)
		$mdpActuel = "";  
	else 
		$mdpActuel = $_POST ["mdpActuel"];
	
	if ( empty ($_POST ["confirmationMdp"]) == true)
		$confirmationMdp = "";  
	else 
		$confirmationMdp = $_POST ["confirmationMdp"];
	

	
	if ($mdpActuel != $mdp) 
	{
		echo " Le mot de passe saisi est incorrect !";
	}
	else 
	{
		if ($mdpActuel != $confirmationMdp) 
		{
			echo " Les mots de passe saisis sont différents  !";
		}
		else 
		{
			// commande suppression bdd
				echo 'Votre compte a bien été supprimé';
		}
	}
?>
