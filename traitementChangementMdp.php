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
	

	
	
	
	if ( empty ($_POST ["mdpActuel"]) == true)
		$mdpActuel = "";  
	else 
		$mdpActuel = $_POST ["mdpActuel"];
	
	if ( empty ($_POST ["newMdp"]) == true)
		$newMdp = "";  
	else 
		$newMdp = $_POST ["newMdp"];
	
	if ( empty ($_POST ["confirmationMdp"]) == true)
		$confirmationMdp = "";  
	else 
		$confirmationMdp = $_POST ["confirmationMdp"];
	
	//Vérification des mdp
	
	if ($mdpActuel != $mdp) 
	{
		echo " Le mot de passe saisi est incorrect !";
	}	
	else 
	{		
		if ($newMdp != $confirmationMdp) 
		{
			echo " Le nouveau mot de passe saisi est différent du mot de passe de confirmation saisi !";
		}
		else
		{
			// préparer requete changement mdp bdd
			$reqChangementMdp = $cnx->prepare("UPDATE utilisateur SET mdp = :mdp WHERE adrMail = :adrMail;");
			$reqChangementMdp->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
			$reqChangementMdp->bindValue(':mdp',$newMdp,PDO::PARAM_STR);
			$reqChangementMdp->execute();
			echo "Le mot de passe a bien été modifié";
			
		}
    

	}
	echo ' <br/> <a href="accueil.php" target="_blank"> <input type="button" value="Retour à l accueil">  </a>'

			
?>
 