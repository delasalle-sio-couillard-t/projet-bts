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
<!DOCTYPE HTML> 
<html>
	<!-- Début du corps -->  
	<body>
		<div class="container-fluid">
			<center>
				<h2>
					Administration
				</h2>
			</center>
		</div>
		<div class="bouton_selection">
            <h6>Pour choisir la partie d'administration que vous désirez, cliquez sur le bouton correspondant :</h6>
			<br>
            <button class ='btn btn-primary' onclick="show_hide('gestion_produit')">Gestion des produits</button>
			<button class ='btn btn-primary' onclick="show_hide('gestion_utilisateur')">Gestion des utilisateurs</button>
        </div>
        <div id="gestion_produit" class="container">
            <div class="gestion_produit">
                <div>
                    <h3>Produit</h3>
                </div>
                <div>
                    <form id="f_ajout_produit" action="" autocomplete="off"> 
                        <h6><u>Ajout d'un produit :</u></h6>

                        <input id="name" name="name" placeholder="Nom" required>
                        <button type="submit" value="Ajouter" class ='btn btn-outline-primary'>Ajouter</button>
                    </form>
                </div>
                <div>
                    <br>
                    <h6><u>Liste des produits</u></h6>
                    <div id="list_produit" class="list_produit">
					
                    </div>
                </div>
            </div>		
        </div>
		<div id="gestion_utilisateur" class="container">
			<div class="div_scrollbar">
				<table class="table">
					<tr>
						<th>
							#
						</th>
						<th>
							Mail
						</th>
						<th>
							Nom
						</th>
						<th>
							Prénom
						</th>
						<th>
						</th>
						<th>
						</th>
					</tr>
				<?php
					$reqUtilisateurs = $cnx->prepare("SELECT * FROM utilisateur;");
					$reqUtilisateurs->execute();
					$ligneUtilisateurs = $reqUtilisateurs->fetch(PDO::FETCH_OBJ);
					
					while($ligneUtilisateurs)					
					{
						echo '<tr>';
						echo 	'<td>'.$ligneUtilisateurs->id.'</td>';
						echo 	'<td>'.$ligneUtilisateurs->adrMail.'</td>';
						echo 	'<td>'.$ligneUtilisateurs->nom.'</td>';
						echo 	'<td>'.$ligneUtilisateurs->prenom.'</td>';
						echo 	'<td>';
						if($ligneUtilisateurs->niveau == 2){
							echo '<button class="btn btn-outline-warning">Supprimer des admins</button>';
						}
						else{
							echo '<button class="btn btn-outline-primary">Ajouter aux admins</button>';
						}
						echo 	'</td>';
						echo 	'<td><button class="btn btn-danger">Supprimer l\'utilisateur</button></td>';
						echo '</tr>';
						
						$ligneUtilisateurs = $reqUtilisateurs->fetch(PDO::FETCH_OBJ);
					}
				
				?>
				<table>
			</div>
        </div>
	</body>
	<script>
		document.getElementById('gestion_produit').style.display ="none";
        document.getElementById('gestion_utilisateur').style.display ="none";
		
		//function qui affiche et cache en fonction de la partie d'administration choisie
        function show_hide(id_div) {
            var x = document.getElementById(id_div);
            
            if (x.style.display === "none") {
                x.style.display = "block";
                
                if(id_div === 'gestion_produit'){
                    document.getElementById('gestion_utilisateur').style.display ="none";
                }
                else if(id_div === 'gestion_utilisateur'){
                    document.getElementById('gestion_produit').style.display ="none";
                }
            } 
            else {
                x.style.display = "none";
            }
        }
	</script>
</html>