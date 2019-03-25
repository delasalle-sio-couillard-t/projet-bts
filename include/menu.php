<!--include-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<!-- accès à la feuille de style -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />


<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" href="index.php">
		<img src="images/logo.png" width="64" height="48" alt="">
		Râ'Smoothie
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">		
		<ul class="navbar-nav mr-auto">
			<?php
				if(isset($_SESSION['niveau']) == true){
					echo 	'<li class="nav-item">
								<a class="nav-link" href="panier.php">Panier</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Gestion de son compte
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								  <a class="dropdown-item" href="infos_utilisateurs.php">Informations personnelles</a>
								  <a class="dropdown-item" href="securite.php">Sécurité</a>
								</div>
							</li>';
							
					if($_SESSION['niveau']=='admin')
					{
						echo ('<li class="nav-item"><a class="nav-link " href="administration.php">Administration</a></li>');
					}
				}
			 ?>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php
				if(isset($_SESSION['niveau'])!=true)
				{
						echo '<li class="nav-item">
								<a class="nav-link" href="connexion.php">Connexion</a>
							</li>';
				}
				else{
					echo 	'<li class="nav-item">
								<a class="nav-link" href="connexion.php?action=deconnexion">Se déconnecter</a>
							</li>';
				}
			?>			
		</ul>
	</div>
</nav>