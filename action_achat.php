<?php	
session_start;		
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
		$lesCommandesUtilisateur->execute();
		
		$insertionLigne = $cnx->prepare("INSERT INTO ligneCommande (idProduit, 
	}
	else{
		
	}
	
}
?>