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
<html>
	<!-- Début du corps -->  
	<body>
		<div class="box">
			<div class="container-fluid">
				<center>
					<h2>
						<img src="Images/votre_compte.png">
					</h2>
				</center>
			</div>
		
		
			<div class="container">
				<h2> Changement de votre mot de passe : </h2>
				<form action = "traitementChangementMdp.php" method = "post">
					<table class="table">
						<tbody>
							<tr>
								<td>Mot de passe actuel: </td>
								<td><input class="input-sm form-control" name="mdpActuel" type="text" size ="25" required ></td>
							</tr>
							<tr>
								<td>Mot de passe souhaité: </td>
								<td><input class="input-sm form-control" name="newMdp" type="text" size ="25" required ></td>
							</tr>
							<tr>
								<td>Confirmer le mot de passe: </td>
								<td><input class="input-sm form-control" name="confirmationMdp" type="text" size ="25" required ></td>
							</tr>
							<tr>
								<td><input class="btn btn-outline-dark" type = "submit"  name="cmdValider" value ="Confirmer"></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				</form>
				
				<form action = "traitementSuppressionCompte.php" method = "post">
					<h2> Suppression du compte : </h2>
					
										<table class="table">
						<tbody>
							<tr>
								<td>Mot de passe actuel: </td>
								<td><input class="input-sm form-control" name="mdpActuel" type="text" size ="25" required ></td>
							</tr>
							<tr>
								<td>Confirmer le mot de passe: </td>
								<td><input class="input-sm form-control" name="confirmationMdp" type="text" size ="25" required ></td>
							</tr>
							<tr>
								<td><input class="btn btn-outline-dark" type = "submit"  name="cmdValider" value ="Confirmer"></td>
								<td></td>
							</tr>
						</tbody>
					</table>
						

				</form>
				
				<form action = "historiqueCommandes.php" method = "post">
					<h2> Historique des commandes : </h2>
					<fieldset>					
						<input class="btn btn-outline-dark" type = "submit"  name="cmdValider" value ="Consultation de vos commandes ">
					</fieldset>
				</form>
			</div>
		</div>
		<?php include('include/footer.php');?>		
	</body>
</html>