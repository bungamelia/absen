<?php
	
class shift
{
	protected $obj;
	function __construct()
	{
		$this->obj = new db;
	}
	
	public function add_shift($nama_shift, $start_shift, $end_shift)
	{
		try {
			$query = "INSERT INTO shift(nama_shift, start_shift, end_shift) VALUES (:nama_shift, :start_shift, :end_shift)";
			
			$this->obj->query($query);
			$this->obj->bind(':nama_shift',$nama_shift);
			$this->obj->bind(':start_shift',$start_shift);
			$this->obj->bind(':end_shift',$end_shift);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}    
	}
	
	public function tampil_shift()
	{
		$query = "SELECT * FROM shift";
		$this->obj->query($query);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function getID_shift($id_shift)
	{
		$query = "SELECT * FROM shift WHERE id_shift=:id_shift";
		$this->obj->query($query);
		$this->obj->bind(':id_shift',$id_shift);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}

	function edit_shift($shift_id, $nama_shift, $start_shift, $end_shift)
	{
		try {
			$query = "UPDATE shift SET nama_shift=:nama_shift, start_shift=:start_shift, end_shift=:end_shift WHERE id_shift=:shift_id";
			$this->obj->query($query);
			$this->obj->bind(":nama_shift",$nama_shift);
			$this->obj->bind(":start_shift",$start_shift);
			$this->obj->bind(":end_shift",$end_shift);
			$this->obj->bind(":shift_id",$shift_id);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage(); 
		}
	}
	
	public function hapus_shift($id_shift)
	{
		$query = "DELETE FROM shift WHERE id_shift=:id_shift";
		$this->obj->query($query);
		$this->obj->bind(":id_shift",$id_shift);
		$this->obj->execute();
		
		header("Location: list_shift.php"); 
	}
	
	public function addShiftline($id_shift, $id_karyawan, $tanggal_shift)
	{
		try {
			$query = "INSERT INTO shift_line(id_shift, id_karyawan, tanggal_shift) VALUES (:id_shift, :id_karyawan, :tanggal_shift)";
			
			$this->obj->query($query);
			$this->obj->bind(':id_shift',$id_shift);
			$this->obj->bind(':id_karyawan',$id_karyawan);
			$this->obj->bind(':tanggal_shift',$tanggal_shift);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}    
	}
	
	public function tampil_shiftline($id_karyawan)
	{
		$query = "SELECT * FROM shift_line sl, shift s, karyawan k WHERE sl.id_shift = s.id_shift AND sl.id_karyawan = k.id_karyawan AND sl.id_karyawan=:id_karyawan
		ORDER BY id_shiftline ASC";
		$this->obj->query($query);
		$this->obj->bind(':id_karyawan',$id_karyawan);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	public function today_shiftline($karyawan_id, $tgl_skrg)
	{
		$query = "SELECT tanggal_shift, id_shift FROM shift_line WHERE id_karyawan=:karyawan_id AND tanggal_shift=:tgl_skrg ";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->bind(':tgl_skrg',$tgl_skrg);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}
			
	public function getAll_shiftline()
	{
		$query = "SELECT * FROM shift_line sl, karyawan k, shift s WHERE sl.id_karyawan = k.id_karyawan AND sl.id_shift = s.id_shift ORDER BY id_shiftline DESC";
		$this->obj->query($query);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
}
?>