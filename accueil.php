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
	<body>
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
						<?php
							$reqProduit = $cnx->prepare("SELECT * FROM produit");
							$reqProduit->execute();
							$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						
							// while pour les boutons
							while($ligneProduit)
							{						
								echo	'<table>
											<tr>
												<td>'.
													'<p><a class="btn btn-secondary" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'">'.
														$ligneProduit->libelle.
													'</a></p>
												</td>';
												
								echo'			<input type="hidden" name="libelleProduit" value="'.$ligneProduit->libelle.'">
												<td>
													<div class="collapse" id="collapse'.$ligneProduit->id.'">'.
														'<div class="card card-body">
															<p>'.
																$ligneProduit->libelle.'</br>'.
																$ligneProduit->prix.'</br>'.
																$ligneProduit->description.'</br>'.
																'<img src="images/'.$ligneProduit->image.'" width="300" height="300" alt=""></br>'.
																'<button class="btn btn-outline-dark btn-sm" type="submit" onclick="ajouter()">Ajouter au panier</button>
															</p>
														</div>
													</div>	
												</td>
											</tr>
										</table>';
								
								$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
							}
						?>
			</div>
		</form>
		<div class="container-fluid">
			<center>
				<h2>
					test affichage n°2
				</h2>
			</center>
		</div>
		<div class="container">
			<table>
				<?php
					$reqProduit = $cnx->prepare("SELECT * FROM produit");
					$reqProduit->execute();
					$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
					
					$x = 0;
					$tableauMiseEnForme ="";
					
					while($ligneProduit)
					{	
						$x += 1;
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
					}
					echo $x.'<br>';
										
					$nbrLigne = $x / 4;
					$nbrLigneTest = $nbrLigne;
					$compteur = 0;
					
					
					$reqProduit = $cnx->prepare("SELECT * FROM produit");
					$reqProduit->execute();
					$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
						
					// while pour les boutons			
					// while pour les boutons
					while($ligneProduit)
					{							
						if($nbrLigne != $nbrLigneTest)
						{
							echo 'pour le smoothie '.$ligneProduit->id.' test réussi : '.$nbrLigne.'<br>';
						}
						
						if(($ligneProduit->id % 3) == 0)
						{
							$tableauMiseEnForme = "0";
						}
						elseif(($ligneProduit->id % 3) == 1)
						{
							$tableauMiseEnForme = "1";
						}
						else
						{
							$tableauMiseEnForme = "2";
						}
						echo $tableauMiseEnForme;
						
						if($compteur = 4)
						{
							$nbrLigneTest = $nbrLigneTest - 1;
							$compteur = 0;
						}
						
						$compteur = $compteur + 1;
						
						$ligneProduit = $reqProduit->fetch(PDO::FETCH_OBJ);
					}
				?>				
			</table>
	</body>
</html>