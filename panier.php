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

?>
<!doctype html>
<html lang="fr">
    <head>
		
        <meta charset="UTF-8">
        <title>Panier HTML5 + JavaScript</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">	
        <script type="text/javascript" src="panier.js"></script>
	<?php
	
	$mail = $_SESSION ['adrMail'];	
	
	$idUtilisateur = Outils::getIdUtilisateur($mail);	
	$commande = Outils::getCommandeUtilisateurEnCours($idUtilisateur); //retourne un objet
	$ligneCommande = Outils::getLigneCommandeByIdCommande($commande->id);//retourne un tableau
	
	echo'
    </head>
    <body style="background-color:#eee7e7">	
        <section class="container">
                <legend>Contenu du panier</legend>
                <table id="tableau" class="table">
                    <thead>
                        <tr>
                            <th>Smoothie</th>
                            <th>Qte</th>
                            <th>Prix unitaire</th>
                            <th>Prix de la ligne</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>';
					$prixTotal = 0;
					if($commande != false){
						foreach(LigneCommande::$tableau_LigneCommande as $LigneCommande){
							$produit = Outils::getProduitByLigneCommande($LigneCommande->id);
							echo '                       
							<tr>
								<td '.$produit->libelle.'</th>
								<td>'.$LigneCommande->quantite.'</th>
								<td>'.$produit->prix.'€</th>
								<td>'.$LigneCommande->quantite*$produit->prix.'€</th>
								<td><button>supprimer</button></th>
							</tr>';
							$prixTotal += $LigneCommande->quantite*$produit->prix;
						}
					}
				echo'	
                </table>
                <br><label>Prix du panier total</label> : <label id = "prixTotal">'.$prixTotal.'€</label>
                <label id = "nbreLignes" hidden>0</label>
        </section>';
		include('include/footer.php');
    echo '</body>
</html>';
?>