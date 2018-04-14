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
			'title'=>'About page',	
			'message'=>'welcome to my PHP MVCproject',
			];
			$this->view('pages/about',$data);
		}

	}
 ?>