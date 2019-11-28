<?php 
​
class CtrlTutos extends Controller{
	
	public function index()
	{
		$this->loadDao('tutos');
​
		$d['tutoss'] = $this->Daotutos->readAll();
		
		$this->set($d);
		$this->render('tutos','index');
	}
​
	public function mestutoss()
	{
		$this->loadDao('tutos');
​
		$d['tutoss'] = $this->Daotutos->readByFkUser($_SESSION['id']);
		$this->set($d);
		
		$this->render('tutos','mestutoss');
	}
​
	public function detail($id)
	{
		$this->loadDao('tutos');
​
		$d['tutos'] = $this->Daotutos->read($id);
		
		$this->set($d);
		$this->render('tutos','detail_tutos');
	}
​
	public function accesAddTutos()
	{	/*si l'utilisateur est connecté, l'autoriser à accéder à la page pour créer une nouvelle tutos*/
		if(isset($_SESSION['id']))
		{
			$this->render('tutos','add_tutos');
		}
		else
		{
			/*si l'utilisateur n'est pas connecté, le rediriger vers une page l'informant qu'il doit avoir un compte pour créer une tutos*/
			$this->render('Accueil','redirectionInscripCo');
		}
	}
​
	public function addtutos()
	{
		$this->loadDao('tutos');
​
		$dossier = ROOT.'img/';
		$fichier = basename($this->files['img']['name']);
		move_uploaded_file($this->files['img']['tmp_name'], $dossier . $fichier);	
​
		$tutos = new tutos($this->input['titre'], $fichier,$this->input['img'],$this->input['description'],$this->input['proposition_flaconnage'],$this->input['materiels'],$this->input['ingredients'],$this->input['fk_user']);
		
		$this->Daotutos->create($tutos);
		// $_SESSION['id'] = DB::lastId();
		$d['tutos'] = $tutos;
		$this->set($d);
		$this->mestutoss($tutos);
	}
​
	public function updateTutos($id)
	{
		$this->loadDao('tutos');
​
		$d['tutos'] = $this->Daotutos->read($id);
		
		$this->set($d);
		$this->render('tutos','update_tutos');
	}
​
	public function updatetutos()
	{
		$this->loadDao('tutos');
​
		$dossier = ROOT.'img/';
		$fichier = basename($this->files['img']['name']);
		move_uploaded_file($this->files['img']['tmp_name'], $dossier . $fichier);
​
		$tutos = $this->Daotutos->read($this->input['tutosId']);
​
		if (!empty($this->input['titre']))
			{
				$tutos->setTitre($this->input['titre']);
			}
​
		if (!empty($this->input['imG']))
			{
				$tutos->setImg($this->input['img']);
			}
​
		if (!empty($this->input['description']))
			{
				$tutos->setDescription($this->input['description']);
			}
​
		if (!empty($this->input['proposition_flaconnage']))
			{
				$tutos->setProposition_flaconnage($this->input['proposition_flaconnage']);
			}
​
		if (!empty($this->input['materiels']))
			{
				$tutos->setMateriels($this->input['materiels']);
			}
​
		if (!empty($this->input['ingredients']))
			{
				$tutos->setIngredients($this->input['ingredients']);
			}
​
		if (!empty($this->input['mode_operatoire']))
			{
				$tutos->setMode_operatoire($this->input['mode_operatoire']);
			}
​
		if (!empty($this->input['fk_user']))
			{
				$tutos->setFk_user($this->input['fk_user']);
			}
​
		$this->Daotutos->update($tutos);
		$d['tutos'] = $tutos;
​
		$this->set($d);
		
		
		
		$this->mestutoss($tutos);
	}
​
	public function archive($id)
	{
		$this->loadDao('tutos');
		$this->Daotutos->archive($id);
​
		// $this->saveUrl('tutos', 'mestutoss');
		$this->mestutoss();
	}
​
	public function delete($id)
	{
		$this->loadDao('tutos');
		$this->Daotutos->delete($id);
​
		// $this->saveUrl('tutos', 'mestutoss');
		$this->mestutoss();
	}
}
​
 ?>





