<?php 
// ----------- PHASE 2 : creation du DAO ----------- //
// charge le modèle lié à la DAO
require_once('modele/User.class.php');
// Déclaration de l'objet dao avec l'héritage du "super controlleur" Controller
class DaoUser {
	// Déclaration de méthode du dao avec l'objet $user en argument
	
//si l'utilisateur clique sur inscription, il envoie les info au controlleur pour qu'il les traite  et les envoie à la vue
	public function create($user) {

		DB::select('INSERT INTO users (nom,prenom,email,pass) VALUES (?,?,?,?)', array($user->getNom(),$user->getPrenom(),$user->getEmail(),$user->getPass()));
	}

//lire et récupérer les données de l'user selon l'id
	public function read($id) {
		$donnees = DB::select('SELECT * FROM users WHERE id = ?', array($id));
//var_dump($user);

		if (!empty($donnees)){
         
            $user = new User($donnees['nom'],$donnees['prenom'],$donnees['email'],$donnees['pass']);

// on récupère l'id de l'utilisateur de la nouvelle instance de l'objet
		
           
           $user->setId($donnees['id']);

            return $user;
        

        } else{
         
        
            return null;
       
       
 } 
   
}
            
           /* $user->setPrenom($user['prenom']);
            $user->setNom($user['nom']);
           	$user->setEmail($user['email']);
            $user->setPass($user['pass']);
           // $user->setNiveau_cuisine($user['niveau_cuisine']);
            
             $user->setId($user['id']);*/


             
             
		//$user->setId($user['id']);
			
            
		
		
		/* Affectation à la variable $user de la nouvelle instance de l'objet User avec en paramètre les données venant de la BDD.
		$user = new User($userData['nom'],$userData['prenom'],$userData['email'],$userData['pass']);
		
		//on récupère l'id de l'utilisateur de la nouvelle instance de l'objet
		$user->setId($userData['id']);

		return $user;
	}*/

//Lorsqu'il y a un point d'interrogation => toujours array ! il y a autant de variable dans l'array que de point d'interrogation
	public function readByEmail($email) {
		$donnees = DB::select('SELECT * FROM users WHERE email = ?', array($email));
		if (!empty($donnees)) {
			$user = new User($donnees['nom'],$donnees['prenom'],$donnees['email'],$donnees['pass']);
			
			$user->setId($donnees['id']);
			
			return $user;

			

		} else {
			return null;
		}
	}

	public function update($user) {
	
		//$donnees = DB::select('UPDATE users SET nom = ?, prenom = ?, pass = ?, email = ? WHERE id = ?', array($user->getPrenom(),$user->getNom(),$user->getEmail(),$user->getPass(),$user->getId()));

		

$donnees = DB::select('UPDATE users SET nom = ?, prenom = ?, email = ?, pass = ? WHERE id = ?', array($user->getNom(),$user->getPrenom(),$user->getEmail(),$user->getPass(),$user->getId()));
		
		if (!empty($donnees)) {
		$user = new User($user['nom'],$user['prenom'],$user['email'],$user['pass']);

		

//on récupère l'id de l'utilisateur de la nouvelle instance de l'objet
//récupère l'id de l'utilisateur créé dans update
			
			$user->setId($donnees['id']);
			
			return $user;
		

}	
}
	/*public function recherche($string){

		if(isset($terme)) {
			$terme=ucwords($terme);
			$donnee = DB::select('SELECT ');
		}*/
}

 ?>