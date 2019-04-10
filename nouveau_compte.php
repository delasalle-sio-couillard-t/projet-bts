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
					<img src="Images/vos_infos.png">
				</center>
			</div>
			
			<div class="container">
				<form method="post" action="creation_compte.php">						
					<table class="table">
						<tr>
							<td>
								<label>Adresse mail*</label>
							</td>
							<td>
								<input type="email" name="mail" class="input-sm form-control" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Mot de passe*</label>
							</td>
							<td>
								<input type="password" name="mdp" class="input-sm form-control" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Nom*</label>
							</td>
							<td>
								<input type="text" name="nom" class="input-sm form-control" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Prénom*</label>
							</td>
							<td>
								<input type="text"  name="prenom" class="input-sm form-control" required></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Rue</label>
							</td>
							<td>
								<input type="text" name="rue" class="input-sm form-control"></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Code Postal</label>
							</td>
							<td>
								<input type="text" name="cp" class="input-sm form-control"></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Ville</label>
							</td>
							<td>
								<input type="text" name="ville" class="input-sm form-control"></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Téléphone Fixe</label>
							</td>
							<td>
								<input type="text" name="telFixe" class="input-sm form-control"></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Téléphone Portable</label>
							</td>
							<td>
								<input type="text" name="telPort" class="input-sm form-control"></input>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-success btn-sm" type="submit">Créer son compte</button>
							</td>
						</tr>
					</table>
				</form>
				* Champs obligatoires<br>
				Vos informations pourront être modifiées ultérieurement.
			</div>
		</div>
		<?php include('include/footer.php');?>		
	</body>
</html>