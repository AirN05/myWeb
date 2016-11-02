<?php

class userController extends Controller {

	public function index(){
		$examples=$this->model->load();		// просим у модели все записи
		$this->setResponce($examples);		// возвращаем ответ 
	}



	public function view($data){
		$example=$this->model->load($data['id']); // просим у модели конкретную запись
		$this->setResponce($example);
	}

	public function add(){
		
		if((isset($_POST['id']))&&(isset($_POST['name']))&&(isset($_POST['score']))){
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToSave=array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score'] );
			$addedItem=$this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}
	}

	public function edit($var){

		$_PUT=json_decode(file_get_contents('php://input'));

		if((isset($_PUT['id']))&&(isset($_PUT['name']))&&(isset($_PUT['score']))){
			// мы передаем в модель массив с данными
			// модель должна вернуть boolean
			$dataToUpd=array('id'=>$_PUT['id'], 'name'=>$_PUT['name'], 'score'=>$_PUT['score'] );
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