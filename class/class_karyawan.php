<?php
	
	class karyawan
	{
		protected $obj;
		function __construct()
		{
			$this->obj = new db;
		}
		
		public function tampil_karyawan(){
			$query = "SELECT * FROM karyawan k, jabatan j, jenis_kelamin jk WHERE k.id_jabatan = j.id_jabatan AND k.id_jenis_kelamin = jk.id_jenis_kelamin ORDER BY id_karyawan DESC";
			$this->obj->query($query);
			$this->obj->execute();
			$data = $this->obj->resultset();
			return $data;
		}
		
		public function nama_karyawan($username){
			$query = "SELECT * FROM karyawan WHERE username NOT LIKE '$username'";
			$this->obj->query($query);
			$this->obj->execute();
			$data = $this->obj->resultset();
			//echo"<pre>";print_r($data);echo"</pre>";
			return $data;
		}
		
		public function cek_username ($userkaryawan){
			$query = "SELECT username FROM karyawan WHERE username = :userkaryawan";
			$this->obj->query($query);
			$this->obj->bind(':userkaryawan',$userkaryawan);
			$this->obj->execute();
			$count = $this->obj->rowCount();
			
			if($count > 0){
				$data_uname = $this->obj->single();
				if(!empty($data_uname->username)){
					echo 'Username provided is already in use.';
				}
			}
		}
		
		public function cek_email ($email){
			$query = "SELECT email FROM karyawan WHERE email = :email";
			$this->obj->query($query);
			$this->obj->bind(':email',$email);
			$this->obj->execute();
			$count = $this->obj->rowCount();
			
			if($count > 0){
				$data_uname = $this->obj->single();
				if(!empty($data_email->email)){
					echo 'Email provided is already in use.';
				}
			}
		}
		
		public function add_karyawan($userkaryawan, $nama_karyawan, $jabatan, $ttl, $alamat, $jenis_kelamin, $email, $password){
			try{
				$query = "INSERT INTO karyawan(username, nama_karyawan, id_jabatan, ttl, alamat, id_jenis_kelamin, email, password) VALUES 
						(:userkaryawan, :nama_karyawan, :jabatan, :ttl, :alamat, :jenis_kelamin, :email, :password)";
				
				$this->obj->query($query);
				$this->obj->bind(':userkaryawan',$userkaryawan);
				$this->obj->bind(':nama_karyawan',$nama_karyawan);
				$this->obj->bind(':jabatan',$jabatan);
				$this->obj->bind(':ttl',$ttl);
				$this->obj->bind(':alamat',$alamat);
				$this->obj->bind(':jenis_kelamin',$jenis_kelamin);
				$this->obj->bind(':email',$email);
				$this->obj->bind(':password',$password);
				$this->obj->execute();
			
				header ("location: list_karyawan.php");
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}    
		}
		
		function getID_jabatan(){
			$query = "SELECT * FROM jabatan";
			$this->obj->query($query);
			$this->obj->execute();
			$data = $this->obj->resultset();
			return $data;
		}
		
		function getID_jk(){
			$query = "SELECT * FROM jenis_kelamin";
			$this->obj->query($query);
			$this->obj->execute();
			$data = $this->obj->resultset();
			return $data;
		}
		
		function getID_karyawan($karyawan_id){
			$query = "SELECT * FROM karyawan k, jabatan j, jenis_kelamin jk WHERE k.id_jabatan = j.id_jabatan AND k.id_jenis_kelamin = jk.id_jenis_kelamin AND id_karyawan = :karyawan_id";
			$this->obj->query($query);
			$this->obj->bind(':karyawan_id',$karyawan_id);
			$this->obj->execute();
			$data = $this->obj->single();
			return $data;
		}
		
		function user_karyawan($userkaryawan){
			$query = "SELECT * FROM karyawan k, jabatan j, jenis_kelamin jk WHERE k.id_jabatan = j.id_jabatan AND k.id_jenis_kelamin = jk.id_jenis_kelamin AND username = :userkaryawan";
			$this->obj->query($query);
			$this->obj->bind(':userkaryawan',$userkaryawan);
			$this->obj->execute();
			$data = $this->obj->single();
			return $data;
		}
		
		function edit_karyawan($karyawan_id, $id_jabatan, $nama_karyawan, $alamat, $email, $ttl, $final_file){
			try{
				$query = "UPDATE karyawan SET nama_karyawan=:nama_karyawan, alamat=:alamat, email=:email, ttl=:ttl, foto=:final_file 
				WHERE id_karyawan=:karyawan_id";
				$this->obj->query($query);
				$this->obj->bind(":nama_karyawan",$nama_karyawan);
				$this->obj->bind(":alamat",$alamat);
				$this->obj->bind(":email",$email);
				$this->obj->bind(":ttl",$ttl);
				$this->obj->bind(":final_file",$final_file);
				$this->obj->bind(":karyawan_id",$karyawan_id);
				$this->obj->execute();
				
				header ("Location: detail_karyawan.php?id=$karyawan_id");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage(); 
			}
		}
			
		function edit_password($karyawan_id, $id_jabatan, $new_pass){
			try{
				$query = "UPDATE karyawan SET password=:new_pass WHERE id_karyawan=:karyawan_id";
				$this->obj->query($query);
				$this->obj->bind(":new_pass",$new_pass);
				$this->obj->bind(":karyawan_id",$karyawan_id);
				$this->obj->execute();
				
				header ("Location: detail_karyawan.php?id=$karyawan_id");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage(); 
			}
		}
		
		public function hapus_karyawan($karyawan_id){
			$query = "DELETE FROM karyawan WHERE id_karyawan=:karyawan_id";
			$this->obj->query($query);
			$this->obj->bind(":karyawan_id",$karyawan_id);
			$this->obj->execute();
			
			header("Location: list_karyawan.php"); 
		}
				
	}
?>