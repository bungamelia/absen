<?php
/**
 *
 *
 *
 *
 *
 */
	
class absen
{
	protected $obj;
	function __construct()
	{
		$this->obj = new db;
	}
	
	public function add_absen($id_karyawan, $id_shift, $waktu, $status)
	{
		try {
			$query = "INSERT INTO absen(id_karyawan, id_shift, waktu, status) VALUES (:id_karyawan, :id_shift, :waktu, :status)";
			
			$this->obj->query($query);
			$this->obj->bind(':id_karyawan',$id_karyawan);
			$this->obj->bind(':id_shift',$id_shift);
			$this->obj->bind(':waktu',$waktu);
			$this->obj->bind(':status',$status);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		} 
	}
		
	function getID_absen($id_karyawan)
	{
		$query = "SELECT * FROM absen WHERE id_karyawan=:id_karyawan ORDER BY waktu DESC LIMIT 1";
		$this->obj->query($query);
		$this->obj->bind(':id_karyawan',$id_karyawan);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}
	
	public function absen_list($karyawan_id)
	{
		$query = "SELECT * FROM absen a, karyawan k WHERE a.id_karyawan = k.id_karyawan AND a.id_karyawan=:karyawan_id ORDER BY id_absen DESC";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function absen_history($id_karyawan, $dari, $sampai)
	{
		$query = "SELECT * FROM absen a, karyawan k WHERE a.id_karyawan=:id_karyawan AND a.id_karyawan=k.id_karyawan AND waktu >= :dari AND waktu <= :sampai
		ORDER BY id_absen DESC";
		$this->obj->query($query);
		$this->obj->bind(':id_karyawan',$id_karyawan);
		$this->obj->bind(':dari',$dari);
		$this->obj->bind(':sampai',$sampai);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function absenBy_date($dari, $sampai)
	{
		$query = "SELECT * FROM absen a, karyawan k WHERE a.id_karyawan=k.id_karyawan AND waktu >= :dari AND waktu <= :sampai ORDER BY id_absen DESC";
		$this->obj->query($query);
		$this->obj->bind(':dari',$dari);
		$this->obj->bind(':sampai',$sampai);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function getAll_absen()
	{
		$query = "SELECT * FROM absen a, karyawan k WHERE a.id_karyawan=k.id_karyawan ORDER BY id_absen DESC";
		$this->obj->query($query);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function cetakAbsen($id_karyawan, $dari, $sampai)
	{
		$query = "SELECT * FROM absen a, karyawan k WHERE a.id_karyawan=:id_karyawan AND a.id_karyawan=k.id_karyawan AND waktu >= :dari AND waktu <= :sampai
		ORDER BY id_absen DESC";
		$this->obj->query($query);
		$this->obj->bind(':id_karyawan',$id_karyawan);
		$this->obj->bind(':dari',$dari);
		$this->obj->bind(':sampai',$sampai);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}

	function edit_absen($absen_id, $id_karyawan, $waktu, $status)
	{
		try {
			$query = "UPDATE absen SET waktu=:waktu, status=:status WHERE id_absen=:absen_id";
			$this->obj->query($query);
			$this->obj->bind(":waktu",$waktu);
			$this->obj->bind(":status",$status);
			$this->obj->bind(":absen_id",$absen_id);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage(); 
		}
	}
}
?>