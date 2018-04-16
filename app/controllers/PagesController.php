<?php 
	
	class Pagescontroller extends Controller{

		public function __construct(){

		}


		public function index(){
			$data=[
			'message'=>'welcome to my PHP MVCproject',
			];
			$this->view('pages/index',$data);
		}

		public function about(){
			$data=[
			'title'=>'Sayed Ahmed',	
			'message'=>'hi It\'s a fun project. the project has been created with core php with MVC pattern along with Bootstrap. the purpose of this project was to implement PHP in professional and secure way.',
			];
			$this->view('pages/about',$data);
		}

	}
 ?>