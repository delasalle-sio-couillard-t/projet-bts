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
	

	$adrMail = $_SESSION['adrMail'];
	
	$reqUtilisateur = $cnx->prepare("SELECT * FROM utilisateur WHERE adrMail = :adrMail");
	$reqUtilisateur->bindValue(':adrMail',$adrMail,PDO::PARAM_STR);
	$reqUtilisateur->execute();
	$ligneUtilisateur = $reqUtilisateur->fetch(PDO::FETCH_OBJ);
	
?> 
<html>
	<!-- Début du corps -->  
	<body>
		<div class="container-fluid">
			<center>
				<h2>
					Vos informations
				</h2>
			</center>
		</div>

		<div class="container">
			<form method="post" action="">
				<?php
					 $idUtilisateur = $ligneUtilisateur->id;
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
								<input type="text" value="'.utf8_encode($nom).'" id = "id" class="input-sm form-control" disabled></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Prénom</label>
							</td>
							<td>
								<input type="text" value="'.utf8_encode($prenom).'" id = "id" class="input-sm form-control" disabled></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Rue</label>
							</td>
							<td>
								<input type="text" value="'.utf8_encode($rue).'" id = "id" class="input-sm form-control" disabled ></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Code Postal</label>
							</td>
							<td>
								<input type="text" value="'.$cp.'" id = "id" class="input-sm form-control" disabled ></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Ville</label>
							</td>
							<td>
								<input type="text" value="'.utf8_encode($ville).'" id = "id" class="input-sm form-control" disabled ></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Téléphone Fixe</label>
							</td>
							<td>
								<input type="text" value="'.$telFixe.'" id = "id" class="input-sm form-control" disabled ></input>
							</td>
						</tr>
						<tr>
							<td>
								<label>Téléphone Portable</label>
							</td>
							<td>
								<input type="text" value="'.$telPort.'" id = "id" class="input-sm form-control" disabled ></input>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button class="btn btn-dark btn-sm" onclick="formModif();">Modifier</button>
							</td>
						</tr>
					</table>';
				?>
			</form>
		</div>
		<?php include('include/footer.php');?>		
	</body>
	<script>
		//modification du tableau pour permettre la modification d'une compétence
        function formModif(){
            var form = "";
			
            document.getElementById("body_competence").innerHTML = form;           
        }
        //annulation de la modification précedente du tableau 
        function annulModif(){
            var form = "";
            var name_competence = "";
            
            for (let competence of arrCompetence) {
                form += "<tr id='modif" + competence.id + "'>";
                form +=   "<td>"+competence.name+"</td>";
                form +=   "<td><button id='" + competence.id + "' type='button' class ='btn btn-outline-primary' onclick='formModif(this.id)'>Modifier</button></td>";                
                form +=   "<td><button id='" + competence.id + "' type='button' class ='btn btn-outline-danger' onclick='deleteCompetence(this.id)'>Supprimer</button></td>";
                form += "</tr>";
            }
            document.getElementById("body_competence").innerHTML = form;
        }
	</script>	
</html>