<?php 
class CtrlAccueil extends Controller {
	public function index() {
		$this->loadDao('User');
		
		$this->render('Accueil','index');
		
	}
}

 ?>