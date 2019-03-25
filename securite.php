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
		<div class="container-fluid">
			<center>
				<h2>
					Votre compte
				</h2>
			</center>
		</div>

		<div class="container">
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
			</form>
		</div>
		<?php include('include/footer.php');?>		
	</body>
</html>