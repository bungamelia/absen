<?php

class notice
{
	protected $obj;
	function __construct()
	{
		$this->obj = new db;
	}
	
	public function tampil_notice()
	{
		$hariini = date('Y-m-d');
		$query = "SELECT * FROM notice n, karyawan k WHERE n.id_karyawan = k.id_karyawan AND tanggal LIKE '$hariini' ORDER BY id_notice DESC";
		$this->obj->query($query);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	public function show_notice($id_karyawan)
	{
		$hariini = date('Y-m-d');
		$query = "SELECT * FROM notice n, karyawan k WHERE n.id_karyawan=k.id_karyawan AND n.id_karyawan=:id_karyawan AND tanggal LIKE '$hariini' ORDER BY id_notice DESC";
		$this->obj->query($query);
		$this->obj->bind(':id_karyawan',$id_karyawan);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	public function add_notice($nama_karyawan, $isi, $tanggal)
	{
		try {
			$query = "INSERT INTO notice(id_karyawan, isi, tanggal) VALUES (:nama_karyawan, :isi, :tanggal)";
			
			$this->obj->query($query);
			$this->obj->bind(':nama_karyawan',$nama_karyawan);
			$this->obj->bind(':isi',$isi);
			$this->obj->bind(':tanggal',$tanggal);
			$this->obj->execute();
		
			header ("location: admin.php");
		} catch(PDOException $e) {
			echo $e->getMessage();
		}    
	}
	
	function getID_karyawan($karyawan_id)
	{
		$query = "SELECT * FROM karyawan k, jabatan j, jenis_kelamin jk WHERE k.id_jabatan = j.id_jabatan AND k.id_jenis_kelamin = jk.id_jenis_kelamin AND id_karyawan = :karyawan_id";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}	
}
?>