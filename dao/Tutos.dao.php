<?php 
​
require_once('modele/Tutos.class.php');
​
class DaoTutos
{
	
	public function create($tutos)
	{
		DB::select('INSERT INTO tutos (titre,img,description,proposition_flaconnage,materiels,ingredients,mode_operatoire,fk_user) VALUES (?,?,?,?,?,?,?,?)', array($tutos->getTitre(),$tutos->getImg(),$tutos->getDescription(),$tutos->getProposition_flaconnage(),$tutos->getMateriels(),$tutos->getIngredients(),$tutos->getMode_operatoire(),$tutos->getFk_user()));
​
		$tutos->getId();
	}
​
	public function read($id) 
	{
		$TutosData = DB::select('SELECT * FROM tutos WHERE id = ? AND archive = 0', array($id));
		
		if (!empty($tutosData))
		{
			$tutos = new tutos($tutosData['titre'],$tutosData['img'],$tutosData['description'],$tutosData['proposition_flaconnage'],$tutosData['materiels'],$tutosData['ingredients'],$tutosData['mode_operatoire'],$tutosData['fk_user']);
		
			$tutos->setId($tutosData['id']);
			return $tutos;
		}
		else
		{
			return null;
		}
	}
​
	public function readAll()
	{
		$tutosData = DB::select('SELECT * FROM tutos WHERE archive = 0 ORDER BY id DESC');
		
		if (!empty($tutosData))
		{
			foreach($tutosData as $key => $tutos)
			{
				$tutoss[$key] = new tutos($tutos['titre'],$tutos['img'],$tutos['description'],$tutos['proposition_flaconnage'],$tutos['materiels'],$tutos['ingredients'],$tutos['mode_operatoire'],$tutos['fk_user']);
				
				$tutoss[$key]->setId($tutos['id']);
			}
			return $tutoss;
		}
		else
		{
			return null;
		}
		
	}
​
	public function readByFkUser($fk_user)
	{
		$tutosData = DB::select('SELECT * FROM tutos WHERE archive = 0 AND fk_user = ? ORDER BY id DESC',array($fk_user));
​
		if (!empty($tutosData))
		{
			foreach($tutosData as $key => $tutos)
			{
				$tutoss[$key] = new tutos($tutos['titre'],$tutos['img'],$tutos['description'],$tutos['proposition_flaconnage'],$tutos['materiels'],$tutos['ingredients'],$tutos['mode_operatoire'],$tutos['fk_user']);
				
				$tutoss[$key]->setId($tutos['id']);
			}
			return $tutoss;
		}
		else
		{
			return null;
		}
		
	}
	
	public function update($tutos)
	{
		DB::select('UPDATE tutos SET titre = ?, img = ?, description = ?, proposition_flaconnage = ?, materiels = ?, ingredients = ?, mode_operatoire = ? WHERE id = ?', array($tutos->getName(),$tutos->getImage(),$tutos->getAdress(),$tutos->getDispo(),$tutos->getProgramme(),$tutos->getDater(),$tutos->getTimer(), $tutos->getId()));
	}
​
	
	public function archive($id)
	{
		DB::select('UPDATE tutos SET archive = 1 WHERE id = ?', array($id));
	}
​
	public function delete($id)
	{
		DB::select('DELETE FROM tutos WHERE id = ?', array($id));
	}
}
​
 ?>