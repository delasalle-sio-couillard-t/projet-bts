﻿<!--include-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<!-- accès à la feuille de style -->
<link href="styles/style.css" rel="stylesheet" type="text/css" />


<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="accueil.php">
		<img src="images/logo" width="30" height="30" alt="">
		Râ'Smoothie
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="">Smoothie</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Panier</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Les guides</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="">Info légalité</a>
			</li>
			<li class="nav-item">
				<?php
					// if($_SESSION['LEVEL']=='admin')
					// {
						// echo ('<a class="nav-link " href="Accueil.php">Administration</a>');
					// }
					// else
					// {
						// echo ('<a class="nav-link disabled" href="Accueil.php">Administration</a>');
					// }
				 ?>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	</div>
</nav>