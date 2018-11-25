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
<!doctype html>
<html lang="fr">
    <head>
		
        <meta charset="UTF-8">
        <title>Panier HTML5 + JavaScript</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">	
        <script type="text/javascript" src="panier.js"></script>
        <script type="text/javascript">		
			function change()
			{
				document.getElementById("prix").value=document.getElementById("prixInitial").value*document.getElementById("qte").value;
			}
        </script>
	<?php
	
	$idProduit = $_POST ['idProduit'];
	$reqProduit = $cnx->prepare("SELECT * FROM produit WHERE id = :id");
						$reqProduit->bindValue(':id',$idProduit,PDO::PARAM_INT);
						$reqProduit->execute();
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
	
	echo'
    </head>
    <body style="background-color:#eee7e7">
		<form method="post" action="action_achat.php">
			<section class="container">
					<legend>Gestion du panier</legend>
					
					<input type="hidden" id="prixInitial" value="'.$ligneProduit->prix.'"></input>
					<table class="table">
						<tr>
							<td>
								<label class="col-lg-3">Smoothie</label>
							</td>
							<td>
								<input type="text" name="idProduit" value="'.$ligneProduit->libelle.'" id = "id" style="border:none; background-color:transparent;width=130px" class="input-sm form-control" size="30"></input>
							</td>
						</tr>
						<tr>
							<td>
								<label class="col-lg-3" >Quantité</label>
							</td>
							<td>
								<input type = "number" name="quantite" min="1" id = "qte" style="width:120px" value="1" class="input-sm form-control" OnChange= "change()" ></input>
							</td>
						</tr>
						<tr>
							<td>
								<label class="col-lg-3">Prix</label>
							</td>
							<td>
								<input type = "text" name="prix" id = "prix" style="border:none; background-color:transparent;with=100px" class="input-sm form-control" value="'.$ligneProduit->prix.'" disabled></input>
							</td>
						</tr>
						<tr>
							<td>
								<button class="btn btn-outline-dark" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>
							</td>
							<td>
							</td>
						</tr>
					</table>
			</section>
		</form>		
	</body>';
	
	include('include/footer.php');
	?>