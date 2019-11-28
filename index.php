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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css "/>

	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
	
	<script
  src="https://code.jquery.com/jquery-3.4.0.min.js"
  integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
  crossorigin="anonymous"></script>

  <script type='text/javascript' src='https://code.jquery.com/jquery-1.5.js'></script>  
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>




<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<link href="https://fonts.googleapis.com/css?family=Domine:400,700&display=swap&subset=latin-ext" rel="stylesheet">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>

		<script src="<?php echo WEBROOT ?>js/recherche.js"></script>

		<script src="<?php echo WEBROOT ?>js/image.js"></script>

		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	
</head>

<body>
		

<header>
	<div id="header">
		<div class="logo">

			<img src="<?php echo WEBROOT ?>img/logo.svg" alt="">
	
		</div>

<span class="recherche">
			<form action = "<?php echo WEBROOT ?>Tutos/recherche" method = "POST">
				<span class="searchInput">
   					<input type = "search" name ="terme" placeholder="Recherche..." />
   				</span>
   	
   			<input type = "submit" name="s" value = "Rechercher"/>
  
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
		<input class="connex" type="email" name="email" placeholder="Email">
		<input class="connex" type="password" name="pass" placeholder="Mot de passe">
		<input class="connex" type="submit" value="Connexion">
		</form>
</div>



<?php

if (isset($_SESSION['id'])) {
		echo '<h3>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h3>';

	}
?>
		
		
	
	
			<!-- WEBROOT -> chemin où l'on va quand on ouvre le site-->
			
			
		
	
	
<nav>
			<a href="<?php echo WEBROOT ?>Accueil/index">Accueil</a>
            
           <a href="<?php echo WEBROOT ?>Tutos/index">Tutos</a>
        		
        		
			<a href="<?php echo WEBROOT ?>Ingedients/index">Ingrédients et leurs propriétés</a>
            
           
           <a href="<?php echo WEBROOT ?>Mode_emploi/index">Mode d'emploi</a>
            

            <a href="<?php echo WEBROOT ?>A_propos/index">A propos</a>
            <a href="<?php echo WEBROOT ?>Contact/index">Contact</a>



            
            <?php 
				if (isset($_SESSION['id'])) {
					echo '<a href="'.WEBROOT.'User/read/'.$_SESSION['id'].'">Profil</a>';
				

				}/*else{
					echo '<a href="'.WEBROOT.'User/create.php"><button>Inscription</button></a>';
				}*/
			?>
       


            

		
		</div>
	
		
		</div>	
	
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

		// Execution de l'action du controleur avec les paramètres supplementaires si existant
		// Si action non présente dans le controleur, alors page 404
		if (method_exists($controller,$action)) {
			unset($param[0]);
			unset($param[1]);
			call_user_func_array(array($controller,$action), $param);
		} else {
			echo 'erreur 404';
		}
	 ?>
	<!-- <div id="scroll_to_top">
		<a href="#top"><img src="<?php echo WEBROOT ?>img/fleche.png"></a></div> 
	 <footer>
	 	<h1 id=footer>footer</h1>
	 	

	 </footer>-->



<script src="<?php echo WEBROOT ?>js/image.js"></script>
<script src="<?php echo WEBROOT ?>js/jquery_inscription.js"></script>
<script src="<?php echo WEBROOT ?>js/jquery_scroll.js"></script>
<script src="<?php echo WEBROOT ?>js/recherche.js"></script>
<script>
	 	var url = "<?php echo $_SESSION['url']?>";
	 </script>
	<script>window.onload = changeUrl(url);</script>

<script src="script.js"></script>
</body>
</html>


