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
				<form method="POST" action="infos_utilisateurs_traitement.php">
					<?php
						$adrMail = $_SESSION['adrMail'];
						$idUtilisateur = $_SESSION['idUtilisateur'];
						
						$reqUtilisateur = $cnx->prepare("SELECT * FROM utilisateur WHERE adrMail = :adrMail");
						$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
						$reqUtilisateur->execute();
						$ligneUtilisateur = $reqUtilisateur->fetch(PDO::FETCH_OBJ);
							
						$mdp = $ligneUtilisateur->mdp;
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
									<label>Nom</label>
								</td>
								<td>
									<input type="text" value="'.utf8_encode($nom).'" id="nom" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Prénom</label>
								</td>
								<td>
									<input type="text" value="'.utf8_encode($prenom).'" id = "prenom" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Rue</label>
								</td>
								<td>
									<input type="text" value="'.utf8_encode($rue).'" id = "rue" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Code Postal</label>
								</td>
								<td>
									<input type="text" value="'.$cp.'" id = "cp" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Ville</label>
								</td>
								<td>
									<input type="text" value="'.utf8_encode($ville).'" id = "ville" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Téléphone Fixe</label>
								</td>
								<td>
									<input type="text" value="'.$telFixe.'" id = "telFixe" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td>
									<label>Téléphone Portable</label>
								</td>
								<td>
									<input type="text" value="'.$telPort.'" id = "telPort" class="input-sm form-control"></input>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button class="btn btn-success btn-sm" type="submit">Modifier vos informations</button>
									<button class="btn btn-danger btn-sm" type="button">Réinitialiser vos informations</button>
								</td>
							</tr>
						</table>';
					?>
				</form>
			</div>
		</div>
		<?php include('include/footer.php');?>		
	</body>
</html>