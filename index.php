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
		<div id="tout">
			<div class="container-fluid">
				<center>
					<h2>
						Nos Smoothies
					</h2>
				</center>
			</div>
			<!-- Création pour un smoothie -->
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
													<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'"></br></br><h4>'.
													utf8_encode($ligneProduit->libelle).													
												'</h4></center>
											</p>';	
										
								echo'	<form method="post" action="achat_smoothie.php">
											<input type="hidden" name="idProduit" value="'.$ligneProduit->id.'">
												<div class="collapse" id="collapse'.$ligneProduit->id.'" >'.
													'<div class="card card-body" id="card_smoothie">
														<p>
															<table>
																<tr>
																	<td>
																		Description :
																	</td>
																	<td>'.
																		utf8_encode($ligneProduit->description).
																	'</td>
																</tr>
																<tr>
																	<td>'.
																		'Prix '.utf8_encode($ligneProduit->prix).' €
																	</td>
																</tr>
																<tr>
																	<td>
																		<button class="btn btn-outline-dark btn-sm" type="submit">Ajouter au panier</button>
																	</td>
																</tr>
															</table>
														</p>
													</div>
												</div>
											</td>
											</form>';		
								
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
		</div>
		<?php include('include/footer.php');?>		
	</body>
</html>




