<?php 
	/**
	 * summary
	 */
	class Userscontroller extends Controller
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	$this->user_model=$this->model('User');
	        
	    }

	    public function login(){
	    	if($_SERVER['REQUEST_METHOD']=='POST'){

	    		//for loading model and storning data
	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	    		$data = [
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'email_err' => '',
			          'password_err' => '',
        				];

        		
        		//email validation
        		if(empty($data['email'])){
        			$data['email_err']='please enter your email';
        		}else{
        			if($this->user_model->findUserByEmail($data['email'])==false){
        				$data['email_err']='no user found';
        			}
        		}
        		//password validation
        		if(empty($data['password'])){
		          	$data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          	$data['password_err'] = 'Password must have atleast 6 characters.';
		        }

		        if(empty($data['email_err']) && empty($data['password_err'])){
		        	if($user=$this->user_model->login($data)){

		        		$_SESSION['user_id']=$user->id;
		        		$_SESSION['user_name']=$user->name;
		        		$_SESSION['user_email']=$user->email;

		        		$this->view('posts/dashboard');

		        	}else{
		        		$data['password_err']='Wrong password';
		        		$this->view('users/login',$data);
		        	}
		        }else{
		        	//loading back the view with errors
		        	$this->view('users/login',$data); 
		        }

				}else{
		    		//for loading login view
		    		$data = [
				         
				          'email' => '',
				          'password' => '',
				          'email_err' => '',
				          'password_err' => ''
	        				];
		    		$this->view('users/login',$data);

	    	}
	    }

	    public function logout(){
	    	if(isset($_SESSION['user_name']) && isset($_SESSION['user_id']) && isset($_SESSION['user_email'])){

	    		unset($_SESSION['user_id']);
	    		unset($_SESSION['user_name']);
	    		unset($_SESSION['user_email']);

	    		header('location:'.URL);

	    	}else {
	    		die('you are not logged in');
	    	}
	    }

	    public function register(){
	    	
	    	if ($_SERVER['REQUEST_METHOD']=='POST'){
	    		//for loading model and storning data
	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	    		$data = [
			          'name' => trim($_POST['name']),
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'confirm_password' => trim($_POST['confirm_password']),
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];

        		//user name validation
        		if(empty($data['name'])){
        			$data['name_err']='please enter your name';
        		}
        		//email validation
        		if(empty($data['email'])){
        			$data['email_err']='please enter your email';
        		}else{
        			if($this->user_model->findUserByEmail($data['email'])){
        				$data['email_err']='email already taken';
        			}
        		}
        		//password validation
        		if(empty($data['password'])){
		          $data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          $data['password_err'] = 'Password must have atleast 6 characters.';
		        }else{
		        	//confirm password validation
			      	if(empty($data['confirm_password'])){
			          $data['confirm_password_err'] = 'Please confirm password.';     
			        }else{
			            if($data['password'] != $data['confirm_password']){
			                $data['confirm_password_err'] = 'Password do not match.';
			            }
			        }
		        }
		        

		        //passing data to the model
		        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
		        	$this->user_model->register($data);
		        	$_SESSION['register_msg']='registration successfull. now sing in';
		        	$this->view('users/login');

		        }else{
		        	$this->view('users/register',$data);
		        }
					    		
	    	}else {
	    		//for loading registration view if GET request
	    		$data = [
			          'name' => '',
			          'email' => '',
			          'password' => '',
			          'confirm_password' => '',
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];
	    		$this->view('users/register',$data);
	    	}
	    }

	    public function index(){

	    	$this->view('users/index');
	    }

	    public function edit(){

	    	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['user_email'])){
	    		//for loading model and storning data
	    		$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	    		$data = [
			          'name' => trim($_POST['name']),
			          'email' => trim($_POST['email']),
			          'password' => trim($_POST['password']),
			          'confirm_password' => trim($_POST['confirm_password']),
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => ''
        				];

        		//user name validation
        		if(empty($data['name'])){
        			$data['name_err']='please enter your name';
        		}
        		
        		//password validation
        		if(empty($data['password'])){
		          $data['password_err'] = 'Please enter a password.';     
		        }elseif(strlen($data['password']) < 6){
		          $data['password_err'] = 'Password must have atleast 6 characters.';
		        }else{
		        	//confirm password validation
			      	if(empty($data['confirm_password'])){
			          $data['confirm_password_err'] = 'Please confirm password.';     
			        }else{
			            if($data['password'] != $data['confirm_password']){
			                $data['confirm_password_err'] = 'Password do not match.';
			            }
			        }
		        }
		        

		        //passing data to the model
		        if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
		        	if($this->user_model->update($data)){

		        		//updating session after modify
		        	    $_SESSION['user_name']=$data['name'];
		        	    $_SESSION['user_email']=$data['email'];

		        	    $_SESSION['update_msg']='update successful';
		        	    $this->view('users/index');
		        		
		        	}else{
		        		die('something went wrong');
		        	}
		        	

		        }else{
		        	//loading view with errros
		        	$this->view('users/edit',$data);
		        }
					    		
	    	}else {
	    		//for loading edit view if GET request
	    		if ($user=$this->user_model->findUserByEmail($_SESSION['user_email'])) {
	    			$data = [
			          'name' => $user->name,
			          'email' => $user->email,
			          'password' => '',
			          'confirm_password' => '',
			          'name_err' => '',
			          'email_err' => '',
			          'password_err' => '',
			          'confirm_password_err' => '',
        				];
        			$this->view('users/edit',$data)	;
	    		}else {
	    			die('retrieve failed');
	    		}
	    	}
	    }


	}

 ?>