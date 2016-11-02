<?php

class indexController extends Controller {

	public $view;

	public function index(){
		$this->view = new View();
		$this->view->generate('myview.html');
		//$message = 'This in index page. This message is in controllers/indexController.php file';
		//$this->setResponce($message);
	}
}