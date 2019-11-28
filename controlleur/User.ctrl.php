<?php 
// ----------- PHASE 3 : creation du Controlleur de l'objet ----------- //
// Déclaration de l'objet controleur qui hérite du "super controleur" Controller
class CtrlUser extends Controller {
	// méthode de l'action index
	public function index() {
//('user')->$name du super controller cad user 		

		$this->loadDao('User');
		// Chargement de la vue 'index' avec la méthode render du "super controleur"
		if (isset($_SESSION['id'])) {
			$d['user'] = $this->DaoUser->read($_SESSION['id']);
			$this->set($d);
		}
		$this->render('User','index');
		
	}
	public function inscription(){
		$this->render('User','inscription');
	}
	// méthode (fonction) de l'action create
	public function create() {
		// récupère les requètes qui se trouve dans le dossier de la DAO User avec la méthode loadDao du "super controleur"

	//si l'utilisateur a cliqué sur le bouton inscription et a entré les info dans le formulaire
		$this->loadDao('User');

		/*REGEXP*/
		if ($this->DaoUser->readByEmail($this->input['email']) != null) {
			$d['user'] = $this->DaoUser->readByEmail($this->input['email']);
			
			$d['log'] = $this->input['email']." déjà inscript";
			$this->set($d);
			$this->render('User','index');
			


/*envoie les infos à la bdd donc création d'un d'un nouvel utilisateur + */


		} else {
			$newUser = new User($this->input['nom'],$this->input['prenom'], $this->input['email'],sha1($this->input['pass']));
			
			$this->DaoUser->create($newUser);
			$_SESSION['id'] = DB::lastId();
			$_SESSION['nom'] = $newUser->getNom();
			$_SESSION['prenom'] = $newUser->getPrenom();
			$_SESSION['email'] = $newUser->getEmail();
			$_SESSION['pass'] = $newUser->getPass();


			$newUser->setId(DB::lastId());

			$d['log'] = "compte crée";
/*rédupération des données pour pouvoir afficher "bienvenue.... " dans vue/user/index*/
			$d['user'] = $newUser;
			//$d['email'] = $email;

			$this->set($d);
			//$this->render('Accueil','index');
			header('Location: '.WEBROOT.'Accueil/index');
			
		}
}
	public function read($id) {
		
	$this->loadDao('User');
	$d['user'] = $this->DaoUser->read($id);
	$this->set($d);
	$this->render('User','profil');
}	

	public function update() {
		$this->loadDao('User');

		$user = $this->DaoUser->read($_SESSION['id']);
		$this->DaoUser->update($user);
		
		if (!empty($this->input['nom'])) {
        	$user->setNom(htmlentities($this->input['nom']));
		} 
		if (!empty($this->input['prenom'])) {
        		$user->setPrenom(htmlentities($this->input['prenom']));
		}
		if (!empty($this->input['email'])) {
        	$user->setEmail(htmlentities($this->input['email']));
		} 
		if (!empty($this->input['pass'])) {
			$user->setPass(htmlentities($this->input['pass']));
        }
		
		// $user = new User($this->input['prenom'],$this->input['nom'],$this->input['email'],$this->input['pass'],$_SESSION['id']);
		
		$this->DaoUser->update($user);
		
		$d['user'] = $user;
		$this->set($d);

		$this->read($_SESSION['id']);

}

		//$this->render('User','profil'); 
/*
		$d['user'] = $this->user;

		$this->set($d);
		$this->render('User','profil');
		
*/
	
        
		//$this->set($d);
        
        //$this->render('User','profil');
    

/*public function readByEmail($email) {
		
		$this->loadDao('User');

		$d['user'] = $this->DaoUser->readByEmail($email);
		
	
		$this->render('User','read');
		

	}*/

	



	public function delete($id) {
		
	}

	public function login() {
		$this->loadDao('User');
		
		if ($this->DaoUser->readByEmail($this->input['email']) != null) {
		
			$user = $this->DaoUser->readByEmail($this->input['email']);

			
		if (sha1($this->input['pass']) == $user->getPass()) {
			
				$_SESSION['id'] = $user->getId();
				$_SESSION['nom'] = $user->getNom();
				$_SESSION['prenom'] = $user->getPrenom();
				//$_SESSION['email'] = $user->getEmail();
				
				header('Location: '.WEBROOT.'Tutos/index');
			} else {
				
				$d['log'] =  "Mot de passe incorrect";
				$this->set($d);
				$this->render('Accueil','index');
			}
		
		} else {

			$d['log'] = "Email incorrect";
			$this->set($d);
			$this->render('Accueil','index');
		}
	}

	

	public function logOut() {

		if (isset($_SESSION['id'])) { 
		$_SESSION = array();


		//$_SESSION = [];
		session_destroy();
		header('Location: '.WEBROOT.'Accueil/index');
	}
	

	}
}

 
?>