<div class="wrapper">




	<div class="image-holder" id="infoPrenom">
				
		echo '<img src="../img/cosm_accueil.jpg">';
    </div>

<div class="form-inner">    
 
<form action="<?php echo WEBROOT ?>User/create" class="has-validation-callback" method="POST"> 

        <label for="prenom">Entrez votre prenom</label> : <input type="text" name="prenom" id="prenom"/><br/>

       	<div class="info" id="infoNom">
			 
				</div>
        <label for="nom">Entrez votre nom</label> : <input type="text" name="nom" id="nom" /><br/>
       		<div class="info" id="infoEmail">
			
				</div>
        <label for="email">Entrez votre Email</label> : <input type="text" name="email" id="email"/><br/>
        
				<div class="info" id="infoPass1">
			 	
				</div>
        
        <label for="motDePasse">Entrez votre mot de passe</label> : <input type="password" name="pass" id="motDePasse"/><br/>
       	
        <input type="submit" class="button" value="Valider">
        

</form>
</div>
<?php
	if (isset($_SESSION['id'])) {
		echo '<h2>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>';
	}





	
?>	
</div>

<script src="<?php echo WEBROOT ?>js/jquery_inscription.js"></script>


</main>





