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
	<head>
		<link rel="icon" href="image/logo.ico" />
	</head>
	<!-- Début du corps -->  
	<body style="background-color:#eee7e7"> <!--background-image:url(images/fondSite); background-size:cover;-->
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
													<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'"><br><br>'.
													$ligneProduit->libelle.													
												'</center>
											</p>';	
										
								echo'	<input type="hidden" name="libelleProduit" value="'.$ligneProduit->libelle.'">
											<div class="collapse" id="collapse'.$ligneProduit->id.'" >'.
												'<div class="card card-body" style="background-color:#FEF7FB">
													<p>	
														Description : <br>'.
														$ligneProduit->description.'</br>'.
														$ligneProduit->prix.'</br>'.													
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
	</body>
</html>