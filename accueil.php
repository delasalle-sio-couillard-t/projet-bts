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
		<div class="container-fluid">
			<center>
				<h2>
					Nos Smoothies
				</h2>
			</center>
		</div>
		<!-- Création pour un smoothie -->
		<div class="container">
			<table>
				<tr>
					<?php
						$reqProduit = $cnx->prepare("SELECT * FROM produit");
						$reqProduit->execute();
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
					
						// while pour les boutons
						while($ligneProduit)
						{						
							echo	'<td>'.
										'<p><a class="btn btn-link" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'">'.
											$ligneProduit->libelle.
										'</a></p>
									</td>';
							
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						}
					?>
				</tr>
			</table>
		</div>
		<div class="container">
			<?php
				$reqProduit = $cnx->prepare("SELECT * FROM produit");
				$reqProduit->execute();
				$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
					
				// while pour les boutons
				while($ligneProduit)
				{						
					echo'			
						<div class="collapse" id="collapse'.$ligneProduit->id.'">'.
							'<div class="card card-body">
								<p>'.
									$ligneProduit->libelle.'</br>'.
									$ligneProduit->prix.'</br>'.
									$ligneProduit->description.'</br>'.
									$ligneProduit->image.'</br>'.
								'</p>
							</div>
						</div>';
							
					$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
				}
			?>
		</div>
	</body>
</html>