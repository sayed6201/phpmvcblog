 <?php 
	/**
	 * summary
	 */
	class user extends Database
	{
		private $db;
	    
	    public function __construct()
	    {
	        $this->db=new Database();   	
		}

		//registers users
		public function register($data){
			$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
			$this->db->query(
				"INSERT INTO 
				users (name,email,password) 
				VALUES(:name,:email,:password)" );

			$this->db->bind(':name',$data['name']);
			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);

			$this->db->execute();
		}

		//logs in users
		public function login($data){
			$this->db->query(
				"SELECT * 
				from users where 
				email=:email"
			);
			$this->db->bind(':email',$data['email']);
			$row=$this->db->single();
			$hashed_password=$row->password;
			if(password_verify($data['password'],$hashed_password)){
				return $row;
			}else {
				return false;
			}
		}

		//updating user information
		//registers users
		public function update($data){
			$data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
			$this->db->query(
				"UPDATE users SET
				name=:name, password=:password 
				WHERE email=:email" );

			$this->db->bind(':name',$data['name']);
			$this->db->bind(':email',$data['email']);
			$this->db->bind(':password',$data['password']);

			if($this->db->execute()){
				return true;
			}else{
				return false;
			}

		}

		// Find USer BY Email
	    public function findUserByEmail($email){
	      $this->db->query("SELECT * FROM users WHERE email = :email");
	      $this->db->bind(':email', $email);

	      $row = $this->db->single();

	      //Check Rows
	      if($this->db->rowCount() > 0){
	        return $row;
	      } else {
	        return false;
	      }
	    }


	}
 ?>