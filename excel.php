<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/** Error reporting */
error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
/** PHPExcel */
include_once 'server.conf.php';
include_once 'PHPExcel/PHPExcel.php';
$user = new user();
$absen = new absen();

if(isset($_POST['excel'])){
	$dari_tgl = $_POST['dari'];
	$sampai_tgl = $_POST['sampai'];
	$id_krywn = $_POST['id_krywn'];

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("ERPsysadmin")
							 ->setLastModifiedBy("ERPsysadmin")
							 ->setTitle("Office 2007 XLSX")
							 ->setSubject("Office 2007 XLSX")
							 ->setDescription("Test document for Office 2007 XLSX")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Laporan Absen");

// Add some data
$objPHPExcel->getActiveSheet()->SetCellValue('A1', "Nama Karyawan");
$objPHPExcel->getActiveSheet()->SetCellValue('B1', "Tanggal");
$objPHPExcel->getActiveSheet()->SetCellValue('C1', "Jam");
$objPHPExcel->getActiveSheet()->SetCellValue('D1', "Status");
			
$rowCount = 2;		
$data = $absen->cetakAbsen($id_krywn, $dari_tgl, $sampai_tgl);
foreach ($data as $row){
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row->nama_karyawan);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, tgl_indo($row->waktu));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, jam($row->waktu));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row->status);
	$rowCount++;
}
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('absen');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Laporan-absen-'.tgl_indo($dari_tgl).'-'.tgl_indo($sampai_tgl).'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
}
exit;
ob_end_clean();
?>
