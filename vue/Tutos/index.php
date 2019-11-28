<main id="addTutos">
	<div class="addTutos">
​
		<div class="conteneur-img">
			<div class="jumbotron jumbotron-fluid heights100p banners">
		  		<div class="container h100">
		    		<div class="contentBox h100">
		    			<div>
		    				<h1>Nouveau tuto</h1>
		    			</div>
		    		</div>
		  		</div>
			</div>
		</div>
​
​
		<div class="container">
	
​
			 <form action="<?php echo WEBROOT ?>Tutos/addEtapes" method="POST" enctype="multipart/form-data" id="formTutos">
			 	
			 	<div>
				 	<label>Titre:
				 	<input type="text" name="name" placeholder="Titre"></label>
					
					<label>Ajouter une photo illustrant le tuto :
					<input type="file" name="img"></label>
					
					<!-- <label>Date :
					<input type="date" name="dater"></label>
​
					<label>Heure  :
					<input type="time" name="timer" min="00:00" max="23:59"></label> -->
				</div>
				
				<div>
					<label>Description :
					<textarea class="textarea" name="programme" placeholder="Expliquer le déroulement de votre recette" required></textarea></label>
				</div>
​
				<div>
					<label>Proposition flaconnage: 
					<textarea class="textarea" name="proposition_flaconnage" placeholder="Proposition de flaconnage"></textarea></label>
					
					<label>Matériels :
					<textarea class="textarea" name="materiels" placeholder="Matériels"></textarea></label>

					<label>Ingrédients :
					<textarea class="textarea" name="ingredients" placeholder="Ingrédients"></textarea></label>
					
					<label>Mode opératoire :
					<textarea class="textarea" name="mode_operatoire" placeholder="Mode opératoire"></textarea></label>


					<input type="hidden" name="fk_user" value="<?php echo $_SESSION['id']?>">

					<input type="hidden" name="fk_tutos" value="<?php echo $tutoSolo->getId(); ?>">
​
				</div>
​
​
				
​
			 </form>
​
			 <div id="bouton_validation">
				<input type="submit" class="bouton_valid" value="Valider" form="formTutos">	
​
				<input type="button" class="bouton_valid" value="Annuler" name="bnom" onClick="javascript:history.back();">
			</div>
	
	
		</div>
	</div>
</main>


<?php
/*
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
?> -->*/
