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
		<div id="tout">
			<div class="d-flex justify-content-center">
				<h2>
					<img src="images/titre1.png">
				</h2>
			</div>
			<!-- Création pour les smoothies -->
			<div class="container">
				<table class="table_presentation">
					<?php
						$reqProduit = $cnx->prepare("SELECT * FROM produit");
						$reqProduit->execute();
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
										
						while($ligneProduit)
						{		
							echo 	'<td>
										<label for="'.$ligneProduit->id.'">
											<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'" onclick=hideCollapse("collapse'.$ligneProduit->id.'")></br></br>
											<h4>'.
												utf8_encode($ligneProduit->libelle).													
											'</h4>
										</label>
									<td>';
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						}
						echo '</table>';
						
						$reqProduit = $cnx->prepare("SELECT * FROM produit");
						$reqProduit->execute();
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						
						
						while($ligneProduit)
						{			
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
																<td>
																	<img src="Images/icons8-delete-50.png" class="button" onclick="closeCollapse(collapse'.$ligneProduit->id.')">
																<td>
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
										</form>
									</td>';		
									
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						}
					?>				
			</div>
		</div>
		<?php include('include/footer.php');?>		
		<script>
			function hideCollapse(id){					
				if(id === 'collapse1'){	
					$('#collapse2').collapse('hide');
					$('#collapse3').collapse('hide');
				}
				else if(id === 'collapse2'){	
					$('#collapse1').collapse('hide');
					$('#collapse3').collapse('hide');				
				}
				else if(id === 'collapse3'){
					$('#collapse1').collapse('hide');
					$('#collapse2').collapse('hide');
				}
			}
			
			function closeCollapse(id){
				$(id).collapse('hide');				
			}
		</script>
	</body>
</html>




