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
<!doctype html>
<html lang="fr">
    <head>
		
        <meta charset="UTF-8">
        <title>Panier HTML5 + JavaScript</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">	
        <script type="text/javascript" src="panier.js"></script>
	<?php
	echo'
    </head>
    <body style="background-color:#eee7e7">	
        <section class="container">
                <legend>Contenu du panier</legend>
                <table id="tableau" class="table">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Qte</th>
                            <th>Prix unitaire</th>
                            <th>Prix de la ligne</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                </table>
                <br><label>Prix du panier total</label> : <label id = "prixTotal"></label>
                <label id = "nbreLignes" hidden>0</label>
        </section>
    </body>
</html>';
?>