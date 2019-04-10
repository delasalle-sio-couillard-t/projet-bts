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
	
	include ('include/Outils.php');
	require_once('include/LigneCommande.php');

	$idProduit = $_GET['id'];
	
	$deleteProduit = SPDO::getInstance()->prepare("DELETE FROM produit WHERE id = :idProduit");
	$deleteProduit->bindValue(':idProduit',$idProduit,PDO::PARAM_INT);
	$deleteProduit->execute();
	
?>