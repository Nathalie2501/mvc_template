<?php

//si la variable $etapes (déclarée dans tutos/readAll existe

if(isset($NewEtapes)) {
//pour chaque objet etape présent dans le tableau etapes
	echo '<section>';
	foreach ($NewEtapes as $key => $NewEtape) {
//génération du lien permettant de lire les étapes selon son tuto
		
		echo '<a href="'.WEBROOT.'Tutos/addEtapes/'.$NewEtape->getId().'">';
		echo '<article>';
//génération de l'insertion de l'image qui s'affiche avec le tuto  sélectionnée	
		echo '<img src="'.WEBROOT.'/img/'.$NewEtape->getFk_tutos().$NewEtape->getImg().'">';
		
		echo $NewEtape->getProposition_flaconnage().'<br>';
		
		echo $NewEtape->getMateriels().'<br>';
		
		echo $NewEtape->getIngredients().'<br>';
		
		echo $NewEtape->getMode_operatoire().'<br>';

		echo '</a>';
		echo '</article>';
		
	}
}
?>