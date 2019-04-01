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
	
	$adrMail = $_SESSION['adrMail'];
	
	if ( empty ($_POST ["idUtilisateur"]) == true)
		$idUtilisateur = "";  
	else 
		$idUtilisateur = $_POST ["idUtilisateur"];	
	
	if ( empty ($_POST ["nom"]) == true)
		$nom = "";  
	else 
		$nom = $_POST ["nom"];
	
	if ( empty ($_POST ["prenom"]) == true)
		$prenom = "";  
	else 
		$prenom = $_POST ["prenom"];
	
	if ( empty ($_POST ["rue"]) == true)
		$rue = "";  
	else 
		$rue = $_POST ["rue"];
	
	if ( empty ($_POST ["cp"]) == true)
		$cp = "";  
	else 
		$cp = $_POST ["cp"];
	
	if ( empty ($_POST ["ville"]) == true)
		$ville = "";  
	else 
		$ville = $_POST ["ville"];
	
	if ( empty ($_POST ["telFixe"]) == true)
		$telFixe = "";  
	else 
		$telFixe = $_POST ["telFixe"];
	
	if ( empty ($_POST ["telPort"]) == true)
		$telPort = "";  
	else 
		$telPort = $_POST ["telPort"];
	
	
	$reqUtilisateur = $cnx->prepare("UPDATE utilisateur SET adrMPail=:adrMail, nom=:nom, prenom=:prenom,rue=:rue,cp=:cp,ville=:ville,tel_fixe=:telFixe,tel_portable=:telPort WHERE id = :id");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':nom',$nom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':prenom',$prenom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':rue',$rue,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':cp',$cp,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':ville',$ville,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telFixe',$telFixe,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telPort',$telPort,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':id',$idUtilisateur,PDO::PARAM_INT);
	
	$test=$reqUtilisateur->execute();
	echo $test;
?> 