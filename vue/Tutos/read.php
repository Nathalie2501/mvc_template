<main id='addEtapes'>


<?php

//si la variable tutos existe (l'utilisateur à cliqué sur la catégorie choisie), affiche moi tous les tutos de la catégories 

if (isset($tutos)) {

//pour chaque objet tutos présent dans le tableau tuto	
	foreach ($tutos as $key => $tuto) {

//génération du lien permettant de lire le tuto selon le tuto choisi 
		
		echo '<a href="'.WEBROOT.'Tutos/read/'.$tuto->getFk_categories().'/'.$tuto->getId().'"><article>';
		echo $tuto->getNom();
		echo '<img src="'.WEBROOT.'img/'.$tuto->getImg().'">';
		echo $tuto->getDescription();
		echo '</article></a>';
	}
} 

//si la variable tutoSolo existe (l'utilisateur a choisi le tuto de la catégorie qu'il veut voir)
//affiche le tuto choisi
//<input type="hidden" name="tutoId" value="'.$tutoSolo->getId().'"> =>envoie input mais caché à l'utilisateur. Envoie pour avoir l'id du tutoSolo choisi par l'utilisateur 

?>

<?php



//si la variable tutoSolo existe affiche moi le nouveau tuto (nom, image,description entré dans la page tutos, index) => chemin des actions : controlleur create => controlleur read => affichage des données récupérées dans la bdd par le read
if (isset($tutoSolo)) {
	
//génération du lien permettant de lire le tuto selon le tuto choisi 
	
	echo $tutoSolo->getNom();
	
	echo '<img src="'.WEBROOT.'img/'.$tutoSolo->getImg().'">';
	echo $tutoSolo->getDescription();

	// afficher toutes les etapes du tuto

	echo '<form action="'.WEBROOT.'Tutos/addEtapes" method="POST" enctype="multipart/form-data">

	<h2>Créer vos étapes</h2>
	
	<input type="text" name="proposition_flaconnage" placeholder="Proposition de flaconnage"><br>		
			
	<input type="text"  name="materiels" placeholder="Matériels utilisés"><br>

	<input type="text" name="ingredients" placeholder="Ingrédients"><br>		
			
	<input type="text" name="mode_operatoire" placeholder="Mode operatoire">
			
	<input type="file" name="img">
	<input type="hidden" name="fk_tutos" value="'.$tutoSolo->getId().'">
	<input type="submit" value="Terminer"></form>';



	
	





}





?>



</main>


