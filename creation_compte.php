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
	

	//infos obligatoires
	if (isset($_POST['mail']))
		$adrMail = $_POST['mail'];
	else 
		$adrMail = "";
	
	if (isset($_POST['mdp']))
		$mdp = $_POST['mdp'];
	else 
		$mdp = "";
	
	if (isset($_POST['nom']))
		$nom = $_POST['nom'];
	else 
		$nom = "";
	
	if (isset($_POST["prenom"]))
		$prenom = $_POST["prenom"];
	else 
		$prenom = "";
	
	
	
	//autres infos
	if ( isset ($_POST["rue"]))
		$rue = $_POST["rue"];
	else 
		$rue = "";  
	
	if ( isset ($_POST["cp"]))
		$cp = $_POST["cp"];
	else 
		$cp = "";  
	
	if (isset($_POST["ville"]))
		$ville = $_POST["ville"];
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
	
	
	$reqUtilisateur = $cnx->prepare("INSERT INTO utilisateur(adrMail, mdp, niveau, nom, prenom, rue, cp, ville, tel_fixe, tel_portable) VALUES(:adrMail, :mdp, 1, :nom, :prenom, :rue, :cp, :ville, :telFixe, :telPort);");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':mdp',$mdp,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':nom',$nom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':prenom',$prenom,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':rue',$rue,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':cp',$cp,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':ville',$ville,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telFixe',$telFixe,PDO::PARAM_STR);
	$reqUtilisateur->bindValue(':telPort',$telPort,PDO::PARAM_STR);
	
	$reqUtilisateur->execute();
	
	header('Location: connexion.php');
	exit();
?> 