<?php
class laporan
{
	protected $obj;
	function __construct()
	{
		$this->obj = new db;
	}
	
	public function add_laporan($id_karyawan, $id_jabatan, $create_date, $modify_date, $subject, $laporan, $state)
	{
		try {
			$query = "INSERT INTO laporan(id_karyawan, id_jabatan, create_date, modify_date, subject, content, state) VALUES 
					(:id_karyawan, :id_jabatan, :create_date, :modify_date, :subject, :laporan, :state)";
			
			$this->obj->query($query);
			$this->obj->bind(':id_karyawan',$id_karyawan);
			$this->obj->bind(':id_jabatan',$id_jabatan);
			$this->obj->bind(':create_date',$create_date);
			$this->obj->bind(':modify_date',$modify_date);
			$this->obj->bind(':subject',$subject);
			$this->obj->bind(':laporan',$laporan);
			$this->obj->bind(':state',$state);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage();
		}    
	}
	
	public function tampil_laporan($karyawan_id, $dari, $sampai)
	{
		$query = "SELECT * FROM laporan l, karyawan k WHERE l.id_karyawan = k.id_karyawan AND l.id_karyawan=:karyawan_id AND 
		modify_date >= :dari AND modify_date <= :sampai";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->bind(':dari',$dari);
		$this->obj->bind(':sampai',$sampai);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	public function laporan_list($karyawan_id)
	{
		$query = "SELECT * FROM laporan l, karyawan k WHERE l.id_karyawan = k.id_karyawan AND l.id_karyawan=:karyawan_id ORDER BY id_laporan DESC";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function laporanBy_date($dari, $sampai)
	{
		$query = "SELECT * FROM laporan l, karyawan k WHERE l.id_karyawan = k.id_karyawan AND modify_date >= :dari AND modify_date <= :sampai ORDER BY id_laporan DESC";
		$this->obj->query($query);
		$this->obj->bind(':dari',$dari);
		$this->obj->bind(':sampai',$sampai);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}
	
	function getAll_laporan()
	{
		$query = "SELECT * FROM laporan l, karyawan k WHERE l.id_karyawan=k.id_karyawan ORDER BY id_laporan DESC";
		$this->obj->query($query);
		$this->obj->execute();
		$data = $this->obj->resultset();
		return $data;
	}

	function tglLaporan($karyawan_id)
	{
		$query = "SELECT * FROM laporan l, karyawan k WHERE l.id_karyawan=k.id_karyawan AND l.id_karyawan=:karyawan_id ORDER BY modify_date DESC LIMIT 1";
		$this->obj->query($query);
		$this->obj->bind(':karyawan_id',$karyawan_id);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}
	
	function getID_laporan($report_id)
	{
		$query = "SELECT * FROM laporan WHERE id_laporan = :report_id";
		$this->obj->query($query);
		$this->obj->bind(':report_id',$report_id);
		$this->obj->execute();
		$data = $this->obj->single();
		return $data;
	}
	
	function edit_laporan($id_karyawan, $id_jabatan, $report_id, $modify_date, $laporan, $state)
	{
		try {
			$query = "UPDATE laporan SET modify_date=:modify_date, content=:laporan, state=:state WHERE id_laporan=:report_id";
			$this->obj->query($query);
			$this->obj->bind(":modify_date",$modify_date);
			$this->obj->bind(":laporan",$laporan);
			$this->obj->bind(":state",$state);
			$this->obj->bind(":report_id",$report_id);
			$this->obj->execute();
		} catch(PDOException $e) {
			echo $e->getMessage(); 
		}
	}
	
	public function hapus_laporan($report_id)
	{
		$query = "DELETE FROM laporan WHERE id_laporan=:report_id";
		$this->obj->query($query);
		$this->obj->bind(":report_id",$report_id);
		$this->obj->execute();
	}
}
?>