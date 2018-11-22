<?php	
session_start();		
if(isset($_SESSION['niveau'])!=true)
{
	header('Location: connexion.php');
	exit();
}
else
{
	$mail = $_SESSION ['adrMail'];
	$idUtilisateur = $cnx->query("SELECT id FROM utilisateur WHERE adrMail LIKE :mail");
	$idUtilisateur->bindValue(':mail ',$mail ,PDO::PARAM_STR);
	
	$lesCommandesUtilisateur = $cnx->prepare("SELECT * FROM commande, utilisateur 
								AND commande.idUtilisateur = :idUtilisateur
								AND finiO/N LIKE 'N'");
	$lesCommandesUtilisateur->bindValue(':idUtilisateur ',$idUtilisateur ,PDO::PARAM_INT);
	$lesCommandesUtilisateur->execute();
	$commandeEnCour = $lesCommandesUtilisateur->fetch(PDO::FETCH_OBJ);
	
	if($commandeEnCour==false){
		$creationCommande = $cnx->prepare("INSERT INTO commande (dateCommande, finiO/N, idUtilisateur) VALUE (:date,'N',:idUtilisateur)");
		$creationCommande->bindValue(':idUtilisateur ',$idUtilisateur ,PDO::PARAM_INT);
		$creationCommande->execute();
		
		$laNouvelleCommande = $cnx->prepare("SELECT * FROM commande, utilisateur 
								AND commande.idUtilisateur = :idUtilisateur
								AND finiO/N LIKE 'N'");
		$laNouvelleCommande->bindValue(':idUtilisateur ',$idUtilisateur ,PDO::PARAM_INT);
		$laNouvelleCommande->execute();
		$laNouvelleCommande->fetch(PDO::FETCH_OBJ);
		
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE :idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit ',$_POST['idProduit'] ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande ',$laNouvelleCommande->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite ',$_POST['quantite']  ,PDO::PARAM_INT);
		$insertionLigne->execute();
	}
	else{
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, idCommande, quantite) VALUE :idProduit , :idCommande , :quantite)");
		$insertionLigne->bindValue(':idProduit ',$_POST['idProduit'] ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':idCommande ',$commandeEnCour->id ,PDO::PARAM_INT);
		$insertionLigne->bindValue(':quantite ',$_POST['quantite']  ,PDO::PARAM_INT);
		$insertionLigne->execute();
	}
	
}
?>