<main id="recherche">



<form action="search.php" method="post">
		<input type="search" name="search" placeholder="Rechercher" minlength="4" spellcheck="true">
		<button>&#x1F50D;</button>
	</form>
	<div id="result"></div>

<?php

$request = $bdd->prepare('SELECT id, nom, description FROM produit WHERE MATCH (nom, description) AGAINST (? WITH QUERY EXPANSION)');
	$request->execute(array($_POST['search']));
	
	$donnees = $request->fetchAll();

	echo json_encode($donnees);


?>
	<script src="script.js"></script>

