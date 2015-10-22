<?php
	
	class user
	{
		protected $obj;
		function __construct()
		{
			$this->obj = new db;
		}
		
		public function login($username, $passwd){
			$query = "SELECT * FROM karyawan WHERE username = :username";
			$this->obj->query($query);
			$this->obj->bind(':username',$username);
			$this->obj->execute();
			$count = $this->obj->rowCount();
			
			if($count > 0){
				$data_user = $this->obj->single();
				if($passwd == $data_user->password)
				{
					$_SESSION['user_session'] = 1;
					$_SESSION['username'] = $username;
					$_SESSION['id_karyawan'] = $data_user->id_karyawan;
					$_SESSION['id_jabatan'] = $data_user->id_jabatan;
					$_SESSION['pass'] = $data_user->password;
					
					if($data_user->id_jabatan == 1){
						header ("location: admin.php");
					}
					else{
						header ("location: user.php");
					}
				}
				else{
					return false;
				}
			}
		}
		
		public function data_user($userid, $id_users){
			$query = "SELECT * FROM users WHERE username=:userid";
			$this->obj->query($query);
			$this->obj->bind(':userid',$userid);
			$this->obj->execute();
			$row_user = $this->obj->single();
			//print_r ($row_user);
		}
		
		public function loggedin(){
			if(empty($_SESSION['user_session'])){
				return 0;
				//print_r($_SESSION['user_session']);
			}
			else{
				return 1;
			}
		}
		
		/*public function get_id_user($id_user){
			$query = "SELECT * FROM users WHERE user=:id_user";
			$this->obj->query($query);
			$this->obj->bind(':id_user',$id_user);
			$this->obj->execute();
			$row_id_user = $this->obj->single(); 
		}*/
		
		public function update($id_user, $username, $password){
			$query = "UPDATE users SET username=:username,password=:password WHERE id_users=:id_user";
			$this->obj->query($query);
			
			$this->obj->bind(':username',$username);
			$this->obj->bind(':password',$password);
			$this->obj->bind(':id_users',$id_user);
			$this->obj->execute();
		}
		
		public function logout($username, $passwd){
			session_start();
			session_destroy();
			header("Location:index.php");
		}
	}
?>
