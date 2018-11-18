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
            function ajouter()
            {
                var code = parseInt(document.getElementById("id").value);
                var qte = parseInt(document.getElementById("qte").value);
                var prix = parseInt(document.getElementById("prix").value);
                var monPanier = new Panier();
                monPanier.ajouterArticle(code, qte, prix);
                var tableau = document.getElementById("tableau");
                var longueurTab = parseInt(document.getElementById("nbreLignes").innerHTML);
                if (longueurTab > 0)
                {
                    for(var i = longueurTab ; i > 0  ; i--)
                    {
                        monPanier.ajouterArticle(parseInt(tableau.rows[i].cells[0].innerHTML), parseInt(tableau.rows[i].cells[1].innerHTML), parseInt(tableau.rows[i].cells[2].innerHTML));
                        tableau.deleteRow(i);
                    }
                }
                var longueur = monPanier.liste.length;
                for(var i = 0 ; i < longueur ; i++)
                {
                    var ligne = monPanier.liste[i];
                    var ligneTableau = tableau.insertRow(-1);
                    var colonne1 = ligneTableau.insertCell(0);
                    colonne1.innerHTML += ligne.getCode();
                    var colonne2 = ligneTableau.insertCell(1);
                    colonne2.innerHTML += ligne.qteArticle;
                    var colonne3 = ligneTableau.insertCell(2);
                    colonne3.innerHTML += ligne.prixArticle;
                    var colonne4 = ligneTableau.insertCell(3);
                    colonne4.innerHTML += ligne.getPrixLigne();
                    var colonne5 = ligneTableau.insertCell(4);
                    colonne5.innerHTML += "<button class=\"btn btn-primary\" type=\"submit\" onclick=\"supprimer(this.parentNode.parentNode.cells[0].innerHTML)\"><span class=\"glyphicon glyphicon-remove\"></span> Retirer</button>";
                }
                document.getElementById("prixTotal").innerHTML = monPanier.getPrixPanier();
                document.getElementById("nbreLignes").innerHTML = longueur;
            }
            
            function supprimer(code)
            {
                var monPanier = new Panier();
                var tableau = document.getElementById("tableau");
                var longueurTab = parseInt(document.getElementById("nbreLignes").innerHTML);
                if (longueurTab > 0)
                {
                    for(var i = longueurTab ; i > 0  ; i--)
                    {
                        monPanier.ajouterArticle(parseInt(tableau.rows[i].cells[0].innerHTML), parseInt(tableau.rows[i].cells[1].innerHTML), parseInt(tableau.rows[i].cells[2].innerHTML));
                        tableau.deleteRow(i);
                    }
                }
                monPanier.supprimerArticle(code);
                var longueur = monPanier.liste.length;
                for(var i = 0 ; i < longueur ; i++)
                {
                    var ligne = monPanier.liste[i];
                    var ligneTableau = tableau.insertRow(-1);
                    var colonne1 = ligneTableau.insertCell(0);
                    colonne1.innerHTML += ligne.getCode();
                    var colonne2 = ligneTableau.insertCell(1);
                    colonne2.innerHTML += ligne.qteArticle;
                    var colonne3 = ligneTableau.insertCell(2);
                    colonne3.innerHTML += ligne.prixArticle;
                    var colonne4 = ligneTableau.insertCell(3);
                    colonne4.innerHTML += ligne.getPrixLigne();
                    var colonne5 = ligneTableau.insertCell(4);
                    colonne5.innerHTML += "<button class=\"btn btn-primary\" type=\"submit\" onclick=\"supprimer(this.parentNode.parentNode.cells[0].innerHTML)\"><span class=\"glyphicon glyphicon-remove\"></span> Retirer</button>";
                }
                document.getElementById("prixTotal").innerHTML = monPanier.getPrixPanier();
                document.getElementById("nbreLignes").innerHTML = longueur;
            }
			
			function change()
			{
				document.getElementById("prix").value=document.getElementById("prixInitial").value*document.getElementById("qte").value;
			}
        </script>
	<?php
	
	$libelleProduit = $_POST ['libelleProduit'];
	//$reqProduit = $cnx->prepare("SELECT * FROM produit WHERE libelle = :libelle");
	//					bindvalue(':libelle',$libelleProduit,PDO::PARAM_INT);
	//					$reqProduit->execute();
	//					$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
	
	echo'
    </head>
    <body>
		<section class="container">
				<legend>Gestion du panier</legend>
				
				<input type="hidden" id="prixInitial" value="2"></input>
				<table class="table">
					<tr>
						<td>
							<label class="col-lg-3">Identifiant</label>
						</td>
						<td>
							<input type="text" value="'.$libelleProduit.'" id = "id" style="width:120px" class="input-sm form-control" disabled></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3" >Quantité</label>
						</td>
						<td>
							<input type = "number" id = "qte" style="width:120px" class="input-sm form-control" OnChange= "change()" ></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Prix</label>
						</td>
						<td>
							<input type = "text" id = "prix" style="width:120px" class="input-sm form-control" value="prixBDD*Quantité" disabled></input>
						</td>
					</tr>
					<tr>
						<td>
							<button class="btn btn-primary" type="submit" onclick="ajouter()"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>
						</td>
						<td>
						</td>
					</tr>
				</table>
		</section>
	</body>';
	?>