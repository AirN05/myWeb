<?php

class pokemonController extends Controller {

	public function index(){
		$examples=$this->model->load();		// просим у модели все записи
		$this->setResponce($examples);		// возвращаем ответ 
	}



public function view($data){
		$example=$this->model->load($data['id']); // просим у модели конкретную запись
		$this->setResponce($example);
	}

	public function add(){
		if((isset($_POST['id']))&&(isset($_POST['name']))&&(isset($_POST['image']))&&(isset($_POST['power']))&&(isset($_POST['speed']))){
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'image'=>$_POST['image'], 'power'=>$_POST['power'], 'speed'=>$_POST['speed']);
			$addedItem=$this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}
	}

	public function edit($id){
		
		
		
		
		$_PUT=json_decode(file_get_contents('php://input'));

		if((isset($_PUT['id']))&&(isset($_PUT['name']))&&(isset($_PUT['image']))&&(isset($_PUT['power']))&&(isset($_PUT['speed']))){
			
			$dataToUpd=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'image'=>$_PUT['image'], 'power'=>$_PUT['power'], 'speed'=>$_PUT['speed']);
			$updItem=$this->model->save($dataToUpd, $var['id']);
			$this->setResponce($updItem);

	}
	}	

	public function delete($var){
			
			if(isset($var['id']))
			{
				$delItem=$this->model->delete($var['id']);
				$this->setResponce($delItem);
			}

	}
}