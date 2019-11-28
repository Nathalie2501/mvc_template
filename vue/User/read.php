<?php 

//si la variable $_SESSION['id'] existe (si l'utilisateur se connecte)
//lui dire bienvenue prenom nom/ sinon recharger la page avec un message (vous n'êtes pas connecté)

if (isset($_SESSION['id'])) {
		echo '<h2>Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h2>';

}else{
	header('Location: '.WEBROOT.'Tutos/index');
}




// si la variable tuto existe, donc si l'utilisateur à crée un tuto, affiche moi le 
//1-> le controlleur envoie l'ordre au dao de lui renvoyer les info du tuto créé par l'utilisateur 2-> les info du nouveau tuto créé sont envoyé au controlleur qui dit à la vue (read.php) d'afficher le tuto que l'utilisateur a créer 3-> si la variable $tuto existe (donc si le tuto a été créé par l'utilisateur) lit les et affiche le 
//On est dans User read parceque le tuto sera crée à partir du moment où l'utilisateur sera connecté -> donc affiche le tuto créé par l'utilisateur



if (isset($tutos)) {
	foreach ($tutos as $key => $tuto) {
		echo $tuto->getNom().'<br>';
		echo $tuto->getDescription().'<br>';
		echo '<img src="'.WEBROOT.'img/'.$tuto->getImg().'">';
	}
}



if(isset($message)){
	echo $message;
}


	
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



<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <form id="msform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Personal Details</li>
                <li>Social Profiles</li>
                <li>Account Setup</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell us something more about you</h3>
                <input type="text" name="fname" placeholder="First Name"/>
                <input type="text" name="lname" placeholder="Last Name"/>
                <input type="text" name="phone" placeholder="Phone"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Social Profiles</h2>
                <h3 class="fs-subtitle">Your presence on the social network</h3>
                <input type="text" name="twitter" placeholder="Twitter"/>
                <input type="text" name="facebook" placeholder="Facebook"/>
                <input type="text" name="gplus" placeholder="Google Plus"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <input type="text" name="email" placeholder="Email"/>
                <input type="password" name="pass" placeholder="Password"/>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="submit" name="submit" class="submit action-button" value="Submit"/>
            </fieldset>
        </form>
        <!-- link to designify.me code snippets -->
        <div class="dme_link">
            <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
        </div>
        <!-- /.link to designify.me code snippets -->
    </div>
</div>
<!-- /.MultiStep Form -->


?>