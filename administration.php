<<<<<<< Updated upstream:administration.php
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
		<!--<img src="images/licorne" width="250" height="380" style="float:right; max-width: 200%; height: auto;";>-->
		<div class="container-fluid">
			<center>
				<h2>
					Nos Smoothies
				</h2>
			</center>
		</div>
		<!-- Création pour un smoothie -->
		<form method="post" action="achat_smoothie.php">
			<div class="container">
				<center>
					<table  class="table">
						<?php
							$reqProduit = $cnx->prepare("SELECT * FROM produit");
							$reqProduit->execute();
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
							
							$compteur = 0;
											
							while($ligneProduit)
							{		
								$compteur = $compteur + 1;
								
								if($compteur == 1)
								{
									echo '<tr>';
								}
								echo 	'<td>
											<p>
												<center>
													<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'"></br>'.
													$ligneProduit->libelle.													
												'</center>
											</p>';	
										
								echo'	<input type="hidden" name="idProduit" value="'.$ligneProduit->id.'">
											<div class="collapse" id="collapse'.$ligneProduit->id.'" >'.
												'<div class="card card-body" style="background-color:#FEF7FB">
													<p>'.
														$ligneProduit->libelle.'</br>'.
														$ligneProduit->prix.'</br>'.
														$ligneProduit->description.'</br>'.
														'<button class="btn btn-outline-dark btn-sm" type="submit">Ajouter au panier</button>
													</p>
												</div>
											</div>
										</td>';		
								
								if($compteur == 4)
								{
									echo '</tr>';
									$compteur = 0;
								}
														
								$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
							}
						?>				
					</table>
				</center>
			</div>
		</form>
		<?php include('include/footer.php');?>
	</body>
=======
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
	<body style="background-image:url(images/pastel2); background-size: cover;"> <!--style="background-image:url(images/pastel2); background-size: cover;"-->
		<!--<img src="images/licorne" width="250" height="380" style="float:right; max-width: 200%; height: auto;";>-->
		<div class="container-fluid">
			<center>
				<h2>
					Nos Smoothies
				</h2>
			</center>
		</div>
		<!-- Création pour un smoothie -->
		<form method="post" action="achat_smoothie.php">
			<div class="container">
				<center>
					<table  class="table">
						<?php
							$reqProduit = $cnx->prepare("SELECT * FROM produit");
							$reqProduit->execute();
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
							
							$compteur = 0;
											
							while($ligneProduit)
							{		
								$compteur = $compteur + 1;
								
								if($compteur == 1)
								{
									echo '<tr>';
								}
								echo 	'<td>
											<p>
												<center>
													<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'"></br></br>'.
													$ligneProduit->libelle.													
												'</center>
											</p>';	
										
								echo'	<input type="hidden" name="idProduit" value="'.$ligneProduit->id.'">
											<div class="collapse" id="collapse'.$ligneProduit->id.'" >'.
												'<div class="card card-body" style="background-color:#FEF7FB">
													<p>'.
														'<u>Description :</u></br>'.
														$ligneProduit->description.'</br></br>'.
														'<u>Prix :</u> '.
														$ligneProduit->prix.' €</br>';	
								if($_POST['adrMail']==null)
								{
										echo 	'<center>Vous devez être connecter pour ajouter un smoothie à votre panier. </br>
												<button class="btn btn-outline-dark btn-sm" type="submit" disabled>Ajouter au panier</button></center>';
								}
								else
								{	
									echo				'<center><button class="btn btn-outline-dark btn-sm" type="submit">Ajouter au panier</button></center>
													</p>
												</div>
											</div>
										</td>';		
								}
								if($compteur == 4)
								{
									echo '</tr>';
									$compteur = 0;
								}
														
								$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
							}
						?>				
					</table>
				</center>
			</div>
		</form>
		<?php include('include/footer.php');?>
	</body>
>>>>>>> Stashed changes:accueil.php
</html>