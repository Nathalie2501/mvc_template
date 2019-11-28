<?php session_start(); 

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	

	<title>Natural-Kosmeo</title>
	<?php

		//endroit où se trouve le fichier 
		define('WEBROOT',str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

		//contient le dossier sur le serveur (ici evite de taper index.php dans tous les liens)
		define('ROOT',str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

	 ?>
	<link rel="stylesheet" href="<?php echo WEBROOT ?>css/style.css" media="screen"/>
	
	<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>


	
	
</head>

<body>
	
<!--<div class="view_port">
  	<div class="polling_message">
    Recherche
  	</div>
  	<div class="cylon_eye"></div>
</div>-->

	
	

	<header>

		<img src="<?php echo WEBROOT ?>img/logo_defi.png">

		
		<span class="recherche">
			<form action = "<?php echo WEBROOT ?>Tutos/recherche" method = "POST">
				<span class="searchInput">
   					<input type = "search" name ="q" placeholder="Recherche..." />
   				</span>
   	
   			<input type = "submit" value = "Valider"/>
  
  			</form>
   		</span>

<?php
	
	if (isset($_SESSION['id'])) {
		echo '<a href="'.WEBROOT.'User/logOut"><button>Déconnexion</button></a>';
	} else {
		echo '<a href="'.WEBROOT.'User/inscription"><button>Inscription</button></a>';
	}
?>
<div id="connexion">
<!-- form action => idem -->
		<form action="<?php echo WEBROOT ?>User/login" method="POST">
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="pass" placeholder="Mot de passe">
		<input type="submit" value="Connexion">
		</form>
</div>



<?php

if (isset($_SESSION['id'])) {
		echo '<h2>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>';

	}
?>
		
		
		
	
			<!-- WEBROOT -> chemin où l'on va quand on ouvre le site-->
			
			
		
		
	
	<nav>
		<ul>
			<li class='menu-accueil'><a href="<?php echo WEBROOT ?>Accueil/index">Accueil</a></li>
            <li class='menu-tutos'><a href="<?php echo WEBROOT ?>Tutos/index">Tutos</a>
        		<ul class="submenu">	
		        	<li class='menu-accueil'><a href="<?php echo WEBROOT ?>Categories/index">Visage</a></li>
		        	<li class='menu-accueil'><a href="<?php echo WEBROOT ?>Categories/corps">Corps</a></li>
		        	<li class='menu-accueil'><a href="<?php echo WEBROOT ?>Categories/Cheveux">Cheveux</a></li>
		        	<li class='menu-accueil'><a href="<?php echo WEBROOT ?>Categories/bain">Bain et douche</a></li>
        		</ul>
        	</li>
			
			
           <li class='menu-accueil'><a href="<?php echo WEBROOT ?>Ingedients/index">Ingrédients et leurs propriétés</a></li>
            
           
           <li class='menu-accueil'><a href="<?php echo WEBROOT ?>Mode_emploi/index">Mode d'emploi</a></li>
            

            <li class='menu-accueil'><a href="<?php echo WEBROOT ?>A_propos/index">A propos</a></li>
            <li class='menu-accueil'><a href="<?php echo WEBROOT ?>Contact/index">Contact</a></li>
            <?php 
				if (isset($_SESSION['id'])) {
					echo '<li class="menu-accueil"><a href="'.WEBROOT.'User/read/'.$_SESSION['id'].'">Profil</a></li>';
				

				}else{
					echo '<a href="'.WEBROOT.'User/create.php"><button>Inscription</button></a>';
				}
			?>
         </ul> 


            

		</nav>
		

	</header>
	<?php 

	// ----------- INIT 1 : creation du routage ----------- //

		// Charge le core de l'appli
		require_once('core/bdd.php');
		require_once('core/controller.php');
		require_once('core/abstractEntity.php');



		// Gestion du routage pour afficher la page par default
		if (isset($_GET['p'])) {
			if ($_GET['p'] == "") {
				$_GET['p'] = "Accueil/index";
				
			}
		} else {
			$_GET['p'] = "Accueil/index";
		}

		// Chargement du controleur

		//$tabControlleur =("","") -> faille de sécurité (rajouter code)
		$param = explode("/",$_GET['p']);

//redirige vers les fichiers [0] -> param [0] (controller) et param [1] -> vue 

//param[0] => paramétrer pour recevoir les dossiers du dossier vue (par exemple)

//param[1] => paramétrer pour recevoir les fichiers des dossiers

//On récupère le controller (param 0) et l'action (param 1)
		$controller = $param[0];
		if (isset($param[1])) {
			$action = $param[1];
		} else {
			$action = 'index';
		}
		
		
		require_once('controlleur/'.$controller.'.ctrl.php');
		$controller = 'Ctrl'.$controller;
		$controller = new $controller();

		// Execution de l'action du controleur avec les paramètres supplementaire si existant
		// Si action non présente dans le controleur, alors page 404
		if (method_exists($controller,$action)) {
			unset($param[0]);
			unset($param[1]);
			call_user_func_array(array($controller,$action), $param);
		} else {
			echo 'erreur 404';
		}
	 ?>

	 <footer>
	 	<h1>footer</h1>
	 	<div id="scroll_to_top">
		<a href="#top"><img src="<?php echo WEBROOT ?>img/fleche.png"></a></div>
	 </footer>


<script src="<?php echo WEBROOT ?>js/jquery_inscription.js"></script>
<script src="<?php echo WEBROOT ?>js/jquery_scroll.js"></script>


</body>
</html>