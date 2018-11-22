<?php	
session_start();	
	//inclusion du menu
	include('include/menu.php'); 
		
	//inclusion du header
	include('include/head.php');
		
	// inclusion des paramètres et de la bibliothéque de fonctions ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_parametres.php');
	// connexion du serveur web à la base MySQL ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_connexion.php');
	
if(isset($_SESSION['niveau'])!=true)
{
	header('Location: connexion.php');
	exit();
}
else
{
	$mail = $_SESSION ['adrMail'];
	
	$idUtilisateur = $cnx->prepare("SELECT id FROM utilisateur WHERE adrMail LIKE :mail");
	$idUtilisateur->bindValue(':mail',$mail ,PDO::PARAM_STR);
	$idUtilisateur->execute();
	$idUtilisateur->fetch();
	
	$lesCommandesUtilisateur = $cnx->prepare("SELECT * FROM commande, utilisateur 
								AND commande.idUtilisateur = :idUtilisateur
								AND fini LIKE 'N'");
	$lesCommandesUtilisateur->bindValue(':idUtilisateur',$idUtilisateur ,PDO::PARAM_INT);
	$lesCommandesUtilisateur->execute();
	$commandeEnCour = $lesCommandesUtilisateur->fetch(PDO::FETCH_OBJ);
	
	if($commandeEnCour==false){
		$creationCommande = $cnx->prepare("INSERT INTO commande (dateCommande, fini, idUtilisateur) VALUE (:date,'N',:idUtilisateur)");
		$creationCommande->bindValue(':idUtilisateur',$idUtilisateur ,PDO::PARAM_INT);
		$creationCommande->bindValue(':idUtilisateur',date("Y-m-j") ,PDO::PARAM_STR);
		$creationCommande->execute();
		$laNouvelleCommande = $cnx->prepare("SELECT * FROM commande, utilisateur 
								AND commande.idUtilisateur = :idUtilisateur
								AND fini LIKE 'N'");
		$laNouvelleCommande->bindValue(':idUtilisateur',$idUtilisateur ,PDO::PARAM_INT);
		$laNouvelleCommande->execute();
		$laNouvelleCommande->fetch(PDO::FETCH_OBJ);
		
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE :idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit',$_POST['idProduit'] ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande',$laNouvelleCommande->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite',$_POST['quantite']  ,PDO::PARAM_INT);
		$insertionLigne->execute();
	}
	else{
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE :idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit',$_POST['idProduit'] ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande',$commandeEnCour->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite',$_POST['quantite']  ,PDO::PARAM_INT);
		$insertionLigne->execute();
	}
	
}
?>