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
			<div id="alert">
			
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
													<img src="images/'.$ligneProduit->image.'" width="250" height="380" data-toggle="collapse" href="#collapse'.$ligneProduit->id.'" role="button" aria-expanded="false" aria-controls="'.$ligneProduit->libelle.'"></br></br>'.
													utf8_encode($ligneProduit->libelle).													
												'</center>
											</p>';	
										
								echo'	<form method="post" action="achat_smoothie.php">
											<input type="hidden" name="idProduit" value="'.$ligneProduit->id.'">
												<div class="collapse" id="collapse'.$ligneProduit->id.'" >'.
													'<div class="card card-body">
														<p>'.
															utf8_encode($ligneProduit->libelle).'</br>'.
															utf8_encode($ligneProduit->prix).'</br>'.
															utf8_encode($ligneProduit->description).'</br>'.
															'<button class="btn btn-outline-dark btn-sm" type="submit" onclick="afficherNotif()">Ajouter au panier</button>
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
		
		<script>
			function afficherNotif(){
				var msg;
				msg = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
				msg +=	"<strong>Holy guacamole!</strong> You should check in on some of those fields below.";
				msg +=	"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"
				msg +=		"<span aria-hidden='true'>&times;</span>";
				msg +=	"</button>";
				msg += "</div>";
				document.getElementById("alert").innerHTML = msg;
			}
		</script>
		
	</body>
</html>




