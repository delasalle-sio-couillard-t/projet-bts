<!--include-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<!-- accès à la feuille de style -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />


<nav class="navbar navbar-expand-lg navbar-light">
	<a class="navbar-brand" style="color: white !important; font-size: 2em !important;" href="index.php">
		<img src="images/logo (2).png" width="64" height="48" alt="">
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
								<a class="nav-link" href="panier.php" style="color: white !important; font-size: 1.5em !important;" >Panier</a>
							</li>
							
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white !important; font-size: 1.5em !important;">
									Gestion de son compte
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								  <a class="dropdown-item" href="infos_utilisateurs.php">Informations personnelles</a>
								  <a class="dropdown-item" href="securite.php">Sécurité</a>
								</div>
							</li>';
							
					if($_SESSION['niveau']=='admin')
					{
						echo ('<li class="nav-item"><a class="nav-link " href="administration.php" style="color: white !important; font-size: 1.5em !important;" >Administration</a></li>');
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