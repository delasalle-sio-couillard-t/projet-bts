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
		<?php			
			/* Vérification de la variable action qui ne contient rien lors de la 1ère exécution */
			if (isset($_GET['action']) && $_GET['action']=="connexion")
			{
				/* Vérification des champs vides */
				if ($_POST['adrMail']=="" OR $_POST['mdp']=="")
				{
					/* message d'erreur si les champs sont vides */
		?>
					<div id="connexion">
						<h3>
							Erreur de connexion
						</h3>
						<div id="erreurCo">
							Merci de bien vouloir renseigner les champs </br>
							<a href="connexion.php"><u>Retour</u></a>
						</div>
					</div>
		<?php
				}								
				/* Si les champs sont remplis */
				else
				{
					/* recherche de l'utilisateur à partir de son nom et de son mot de passe */
					// préparation de la requête
					$req_pre = $cnx->prepare("SELECT * FROM utilisateur WHERE adrMail=:adrMail AND mdp=:mdp");
					// liaison des variables à la requête préparée
					$req_pre->bindValue(':adrMail', $_POST['adrMail'], PDO::PARAM_STR);

					$req_pre->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
					$req_pre->execute();
					//le résultat est récupéré sous forme d'objet
					$resultat=$req_pre->fetch(PDO::FETCH_OBJ);
					
					//si aucune ligne trouvée
					if (empty($resultat)) 
					{
		?> 
						<div id='connexion'>
							<h3>
								Erreur de connexion
							</h3>
							<div id='erreurCo'>
								<p>Vous n'êtes pas enregistré, veuillez contacter l'administrateur ! </p>
								<a href='connexion.php'><u>Retour</u></a>
							</div>
						</div>
		<?php
					}
					else
					{
						/* Si l'utilisateur a été trouvé  */
						if($resultat == true)  {
							/* sauvegarde de son nom et de son mot de passe dans des variables de session */
							$_SESSION['adrMail']=$_POST['adrMail'];							
							
							$_SESSION['idUtilisateur']= $resultat->id;
						
							/* si l'utilisateur connecté est un administrateur ou bien un autre utilisateur */
							if($resultat->niveau == 2)	{
								$_SESSION['niveau']='admin';
							}
							else
							{	
								if($resultat->niveau == 1) 	{
									$_SESSION['niveau']='utilisateur';
								}
								else
								{
									$_SESSION['niveau']='rien';
								}
							}
						
							/* appel de la page suivante accueil.php*/
							header("Location:index.php");	
						}
						else
						{
							/* affichage de l'erreur */
		?>
							<div id="connexion">
								<h3>Erreur de connexion</h3>
								<div id="erreurCo">
									Erreur de connexion, informations erronées ! </br>							
									<a href="connexion.php"><u>Retour</u></a>
								</div>
							</div>
		<?php
						}
					}
				}
			}
			/* Si l'action est déconnexion */
			elseif (isset($_GET['action']) && $_GET['action']=="deconnexion")
			{
				/* suppression des variables de session */
				session_unset();
				session_destroy();
				/* retour à la page accueil.php  */
				header("Location:index.php");
			}
			else
			{
			/* affichage du formulaire de saisie lors de la 1ère exécution */
		?>
				<div class="login-container">
					<div class="d-flex justify-content-center">
						<!-- rappel de cette page lors du clic sur le bouton Valider (2ème exécution) -->
						<form action="connexion.php?action=connexion" method="post" class="login-form-1">
							<h3>
								Connexion
							</h3>
							<table>
								<tr>
									<td>Adresse mail : </td>
								</tr>
								<tr>
									<td> <input type="text" name="adrMail"></td>
								</tr>
								<tr>
									<td>Mot de passe : </td>								
								</tr>
								<tr>
									<td> <input type="password" name="mdp"></td>
								</tr>
							</table>
							<br>
							<input type="submit" value="Valider" class="btnSubmit">
							<br>
							<br>
							<a href="forgetMdp.php" ><u>Mot de passe oublié ?</u></a>
						</form>
					</div>				
				</div>
		<?php
			}
		?>
	</body>
</html>