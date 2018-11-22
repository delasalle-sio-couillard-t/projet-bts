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

<?php
	$adrMail = $_SESSION['adrMail'];
	$mdp = $_SESSION['password'];
	
	$reqUtilisateur = $cnx->prepare("SELECT * FROM utilisateur WHERE adrMail = :adrMail");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->execute();
	$ligneUtilisateur = $reqUtilisateur->fetch(PDO::FETCH_OBJ);
	
	

	 $idUtilisateur = $ligneUtilisateur->id;
	 $nom = $ligneUtilisateur->nom;
	 $prenom = $ligneUtilisateur->prenom;
	 $rue = $ligneUtilisateur->rue;
	 $cp = $ligneUtilisateur->cp;
	 $ville = $ligneUtilisateur->ville;
	 $telFixe = $ligneUtilisateur->tel_fixe;
	 $telPort = $ligneUtilisateur->tel_portable;

echo'						
<table class="table">
					<tr>
						<td>
							<label class="col-lg-3">Identifiant</label>
						</td>
						<td>
							<input type="text" value="'.$idUtilisateur.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Nom</label>
						</td>
						<td>
							<input type="text" value="'.$nom.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Prénom</label>
						</td>
						<td>
							<input type="text" value="'.$prenom.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Rue</label>
						</td>
						<td>
							<input type="text" value="'.$rue.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled ></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Code Postal</label>
						</td>
						<td>
							<input type="text" value="'.$cp.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled ></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Ville</label>
						</td>
						<td>
							<input type="text" value="'.$ville.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled ></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Téléphone Fixe</label>
						</td>
						<td>
							<input type="text" value="'.$telFixe.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled ></input>
						</td>
					</tr>
					<tr>
						<td>
							<label class="col-lg-3">Téléphone Portable</label>
						</td>
						<td>
							<input type="text" value="'.$telPort.'" id = "id" style="width:120px" class="input-sm form-control" size="30" disabled ></input>
						</td>
					</tr>
					
					

				</table>
				 
				<!-- exécution du script traitement après clic sur le bouton -->
				<form action = "traitementChangementMdp.php" method = "post">
				<h2> Changement de votre mot de passe : </h2>
				<fieldset>
						<label>Mot de passe actuel: </label>
						<input name="mdpActuel" type="text" size ="25" required ><br/> 
						<label>Mot de passe souhaité: </label>
						<input name="newMdp" type="text" size ="25" required ><br/> 
						<label>Confirmer le mot de passe: </label>
						<input name="confirmationMdp" type="text" size ="25" required ><br/> 
						<input type = "submit"  name="cmdValider" value ="Confirmer">
				</fieldset>
				</form>
				<form action = "traitementSuppressionCompte.php" method = "post">
				<h2> Suppression du compte : </h2>
				<fieldset>
						<label>Mot de passe actuel: </label>
						<input name="mdpActuel" type="text" size ="25" required ><br/>  
						<label>Confirmer le mot de passe: </label>
						<input name="confirmationMdp" type="text" size ="25" required ><br/> 
						<input type = "submit"  name="cmdValider" value ="Confirmer">
				</fieldset>
				</form>
				<form action = "historiqueCommandes.php" method = "post">
				<h2> Historique des commandes : </h2>
				<fieldset>					
						<input type = "submit"  name="cmdValider" value ="Consultation de vos commandes ">
				</fieldset>
				</form>'
				
?>