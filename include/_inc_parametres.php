<?php
// ce fichier est destiné à être inclus dans les pages PHP qui ont besoin de se connecter à une base de données
// 2 possibilités pour inclure ce fichier :
//     include_once ('_inc_parametres.php');
//     require_once ('_inc_parametres.php');

// paramètres de connexion de l'application cliente au SGBD MySQL
$PARAM_HOTE = "localhost";		// nom du serveur de données : localhost 
$PARAM_port = '3306';
$PARAM_USER = "root";			// nom de l'utilisateur
$PARAM_PWD  = "";		// son mot de passe					
$PARAM_BDD  = "bdd_projet_smoothie";			// nom de la base de données	

// ATTENTION : on ne met pas de balise de fin de script pour ne pas prendre le risque
// d'enregistrer d'espaces après la balise de fin de script !!!!!!!!!!!!