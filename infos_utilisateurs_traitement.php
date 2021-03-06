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
	$idUtilisateur = $_SESSION['idUtilisateur'];	
	
	if (isset($_POST['nom']))
		$nom = utf8_decode($_POST['nom']);
	else 
		$nom = "";
	
	if (isset($_POST["prenom"]))
		$prenom = utf8_decode($_POST["prenom"]);
	else 
		$prenom = "";  
	
	if ( isset ($_POST["rue"]))
		$rue = utf8_decode($_POST["rue"]);
	else 
		$rue = "";  
	
	if ( isset ($_POST["cp"]))
		$cp = $_POST["cp"];
	else 
		$cp = "";  
	
	if (isset($_POST["ville"]))
		$ville = utf8_decode($_POST["ville"]);
	else 
		$ville = "";  
	
	if (isset($_POST["telFixe"]))
		$telFixe = $_POST["telFixe"];
	else 
		$telFixe = "";  
	
	if (isset($_POST["telPort"]))
		$telPort = $_POST["telPort"];
	else 
		$telPort = "";  
	
	
	$reqUtilisateur = $cnx->prepare("UPDATE utilisateur SET adrMail=:adrMail, nom=:nom, prenom=:prenom,rue=:rue,cp=:cp,ville=:ville,tel_fixe=:telFixe,tel_portable=:telPort WHERE id = :id");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':nom',$nom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':prenom',$prenom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':rue',$rue,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':cp',$cp,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':ville',$ville,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telFixe',$telFixe,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telPort',$telPort,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':id',$idUtilisateur,PDO::PARAM_INT);
	
	$reqUtilisateur->execute();
	
	header('Location: infos_utilisateurs.php');
	exit();
?> 