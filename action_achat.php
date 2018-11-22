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
	include_once ('include/Outils.php');
	
if(isset($_SESSION['niveau'])!=true)
{
	header('Location: connexion.php');
	exit();
}
else
{
	$mail = $_SESSION ['adrMail'];
	
	$idUtilisateur = Outils::getIdUtilisateur($mail);
	
	$commandeEnCour = Outils::getCommandeUtilisateurEnCours($idUtilisateur);
	
	if($commandeEnCour==false)
	{
		$creationCommande = $cnx->prepare("INSERT INTO commande (dateCommande, fini, idUtilisateur) VALUE (:date,'N',:idUtilisateur)");
		$creationCommande->bindValue(':idUtilisateur',$idUtilisateur,PDO::PARAM_INT);
		$creationCommande->bindValue(':date',date("Y-m-j") ,PDO::PARAM_STR);
		$creationCommande->execute();
		
		$laNouvelleCommande = $cnx->prepare("SELECT * FROM commande, utilisateur WHERE commande.idUtilisateur = :idUtilisateur AND fini LIKE 'N'");
		$laNouvelleCommande->bindValue(':idUtilisateur',$idUtilisateur,PDO::PARAM_INT);
		$laNouvelleCommande->execute();
		$ligneLaNouvelleCommande = $laNouvelleCommande->fetch(PDO::FETCH_OBJ);
		
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE (:idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit',$_POST['idProduit'],PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande',$ligneLaNouvelleCommande->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite',$_POST['quantite']  ,PDO::PARAM_INT);
		$insertionLigne->execute();
		
		header('Location: panier.php');
		exit();
	}
	else{
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE (:idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit',$_POST['idProduit'] ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande',$commandeEnCour->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite',$_POST['quantite'] ,PDO::PARAM_INT);
		$insertionLigne->execute();	
		
		// echo $_POST['idProduit'].','. $commandeEnCour->id." , ".$_POST['quantite'];
		header('Location: panier.php');
		exit();
	}
	
}
?>