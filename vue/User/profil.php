<main id='profil'>
<div id='pro_entete'>
	</div>





<div align="center">
<h2>Consultez et modifiez les informations du compte</h2>

<div align="left">


	
	
<section id="userUpdate">
	
		

	<form action="<?php echo WEBROOT ?>User/update" method="POST">
		
		<label>Nom :</label>
		<input type="text" textarea cols="40" rows="30" name="nom" placeholder="Changer le nom" value="<?php  echo $_SESSION['nom']; ?>"><br>
		
		<label>Prénom :</label>

		<input type="text" name="prenom" placeholder="Changer le prénom" value="<?php  echo $_SESSION['prenom']; ?>"><br>
		
		
		
		<label>Email :</label>
		<input type="email" textarea cols="40" rows="30" name="email" placeholder="Changer votre adresse mail" value="<?php  echo $user->getEmail(); ?>"><br>
		
		
		<label>Mot de passe :</label>

		<input type="password" textarea cols="30" rows="20" name="pass" placeholder="Mot de passe" value=""><br>
		
		
		
		<input type="submit" value="Mettre à jour mon profil">


</form>

</section>
<?php



if (isset($log)){
	echo $log;
}


?>
