<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$absen = new absen();
	$karyawan = new karyawan();
	
	if($user->loggedin() == "0"){ 
		header ("location: index.php");
	} 
	if($_SESSION['id_jabatan'] != 1){
		header ("location: index.php");
	}
	
	$username = $_SESSION['username'];
	$karyawan_id = $_SESSION['id_karyawan'];		
?>

<body>
	<!-- start: Header -->
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="index.html"><span>Maxindo Content Solution</span></a>

			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a class="btn dropdown-toggle" data-toggle="dropdown">
							<i class="halflings-icon white user"></i><?php echo $_SESSION['username']; ?><span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="dropdown-menu-title">
								<span>Account Settings</span>
							</li>
							<li><a href="detail_karyawan.php?id=<?php echo $karyawan_id; ?>"><i class="halflings-icon user"></i>Profile</a></li>
							<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
						</ul>
					</li>
					<!-- end: User Dropdown -->
				</ul>
			</div>
			<!-- end: Header Menu -->
		</div>
	</div>
</div>
<!-- start: Header -->
<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><?php if($_SESSION['id_jabatan'] == 1){ ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<?php
							if($_SESSION['id_jabatan'] == 1){
						?>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="report_absen.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<li><a href="list_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Shift</span></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<!-- start: Content -->
			<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="admin.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Absen</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span10">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon time"></i><span class="break"></span>Absen</h2>
					</div>
					<div class="box-content">
						<form method="POST" class="form-horizontal">
						  <div class="control-group">
							<input type="text" class="input datepicker" name="dari" required="required" placeholder="Dari">
							<input type="text" class="input datepicker" name="sampai" required="required" placeholder="Sampai">
							<select id="nama_karyawan" name="nama_karyawan">
							<option selected="selected" value="tampil">Search by User</option>
								<?php
									$baris = $karyawan->tampil_karyawan();
									foreach($baris as $krywn){
								?>
								<option value="<?php echo $krywn->id_karyawan; ?>"><?php echo $krywn->nama_karyawan; ?></option>
								<?php }  ?>
							</select>
							<input type="submit" class="btn btn-primary" value="Search" name="search">
						  </div>
						</form>
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>No.</th>
								  <th>Nama Karyawan</th>
								  <th>Tanggal</th>
								  <th>Jam</th>
								  <th>Status</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
							if(isset($_POST['search'])){
								$nama_karyawan = $_POST['nama_karyawan'];
								$tgl_dari = explode("/", $_POST['dari']);
								$dari = $tgl_dari[2]."-".$tgl_dari[0]."-".$tgl_dari[1];
								$tgl_sampai = explode("/", $_POST['sampai']);
								$sampai = $tgl_sampai[2]."-".$tgl_sampai[0]."-".$tgl_sampai[1];
								if($nama_karyawan == "tampil"){
									$row = $absen->absenBy_date($dari, $sampai);
								}
								else{
									$row = $absen->absen_history($nama_karyawan, $dari, $sampai);
								}
								$no=1;
								foreach($row as $data){
						  ?>
							<tr>
								<td><?php echo $no++."."; ?></td>
								<td><?php echo $data->nama_karyawan; ?></td>
								<td><?php echo tgl_indo($data->waktu); ?></td>
								<?php 
									$jam_masuk = jam($data->waktu);
									if ($data->status == "masuk" && $jam_masuk >= date('09:01:00') && $jam_masuk < date('09:15:00')){
								?>
								<td class="green"><?php echo jam($data->waktu); ?></td><?php } 
									elseif($data->status == "masuk" && $jam_masuk >= date('09:15:00') && $jam_masuk < date('09:30:00')){
								?>
								<td class="yellow"><?php echo jam($data->waktu); ?></td><?php } 
									elseif($data->status == "masuk" && $jam_masuk >= date('09:30:00')){
								?>
								<td class="red"><?php echo jam($data->waktu); ?></td><?php } 
								else{ ?>
								<td><?php echo jam($data->waktu); ?></td><?php } ?>
								<td><?php echo $data->status; ?></td>
							</tr>
							<?php } }
								else{ 
									$getabsen = $absen->getAll_absen();
									$no=1;
									foreach($getabsen as $allabsen){
							?>
							<tr>
								<td><?php echo $no++."."; ?></td>
								<td><?php echo $allabsen->nama_karyawan; ?></td>
								<td><?php echo tgl_indo($data->waktu); ?></td>
								<td><?php echo jam($data->waktu); ?></td>
								<td><?php echo $allabsen->status; ?></td>
							</tr>
							<?php } }?>
						  </tbody>
						</table>
					 
					   <form method="post" action="excel.php" >
						<div class="form-actions">
							<?php 
							if(isset($_POST['search'])){ 
								$nama_karyawan = $_POST['nama_karyawan'];
								$tgl_dari = explode("/", $_POST['dari']);
								$dari = $tgl_dari[2]."-".$tgl_dari[0]."-".$tgl_dari[1];
								$tgl_sampai = explode("/", $_POST['sampai']);
								$sampai = $tgl_sampai[2]."-".$tgl_sampai[0]."-".$tgl_sampai[1];
							?>
							<input type="hidden" name="dari" value="<?php echo $dari; ?>">
							<input type="hidden" name="sampai" value="<?php echo $sampai; ?>">
							<input type="hidden" name="id_krywn" value="<?php echo $nama_karyawan; ?>">
							<input type="submit" class="btn btn-success" value="Export to Excel" name="excel">
							<?php } ?>
					   </form>
					   <form method="post" action="pdf.php" class="pull-right" target="_blank">
							<?php 
							if(isset($_POST['search'])){ 
								$nama_karyawan = $_POST['nama_karyawan'];
								$tgl_dari = explode("/", $_POST['dari']);
								$dari = $tgl_dari[2]."-".$tgl_dari[0]."-".$tgl_dari[1];
								$tgl_sampai = explode("/", $_POST['sampai']);
								$sampai = $tgl_sampai[2]."-".$tgl_sampai[0]."-".$tgl_sampai[1];
							?>
							<input type="hidden" name="dari" value="<?php echo $dari; ?>">
							<input type="hidden" name="sampai" value="<?php echo $sampai; ?>">
							<input type="hidden" name="id_krywn" value="<?php echo $nama_karyawan; ?>">
							<input type="submit" class="btn btn-danger" value="Export to PDF" name="pdf">
							<?php } ?>
						</div>
					  </form>
					</div>
				</div><!--/span-->
			</div><!--/row-->
		</div>
		<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>