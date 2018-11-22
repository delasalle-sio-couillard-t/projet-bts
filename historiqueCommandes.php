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
	$adrMail = $_SESSION['adrMail'];
	
	$reqUtilisateur = $cnx->prepare("SELECT id FROM utilisateur WHERE adrMail = :adrMail");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->execute();
	$ligneUtilisateur = $reqUtilisateur->fetch(PDO::FETCH_OBJ);


	$reqHistorique = $cnx->prepare("Select * FROM commande  WHERE idUtilisateur = :id AND fini ='O' ;");
	$reqHistorique->bindValue(':id',$ligneUtilisateur->id,PDO::PARAM_INT);
	$reqHistorique->execute();
	$ligneHistorique = $reqHistorique->fetch(PDO::FETCH_OBJ);
			
	while($ligneHistorique)
	{
		echo $ligneHistorique->dateCommande;
		echo $ligneHistorique->dateLivraison;			
		$ligneHistorique = $reqHistorique->fetch(PDO::FETCH_OBJ);
	}			
?>