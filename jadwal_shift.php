<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$shift = new shift();
	$karyawan = new karyawan();
	
	if ($user->loggedin() == "0") { 
		header("Location = index.php");
	} 
	
	if ($_SESSION['id_jabatan'] != 1) {
		header("Location = index.php");
	}
	
	$employee_id = $_SESSION['id_karyawan'];
	
	if (isset($_POST['save'])) {
		$id_shift = $_POST['id_shift'];
		$id_karyawan = $_POST['nama_karyawan'];
		$from = $_POST['dari'];
		$to = $_POST['sampai'];
		
		$startTime = strtotime($from); 
		$endTime = strtotime($to);
		
		
		for ($time = $startTime; $time <= $endTime; $time = strtotime('+1 day', $time)) { 
			$thisDate = date('Y-m-d', $time); 
			$_POST['tanggal_shift'] = $thisDate; 
			$tanggal_shift = $_POST['tanggal_shift'];
			//echo"<pre>"; print_r($_POST); echo"</pre>";
			$shift->addShiftline($id_shift, $id_karyawan, $tanggal_shift);
		}
	}
	
	if (isset($_GET['delete'])) {
		$id_shift = $_GET['delete'];
		$shift->hapus_shift($id_shift);
	}
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
								<li><a href="detail_karyawan.php?id=<?php echo $employee_id; ?>"><i class="halflings-icon user"></i>Profile</a></li>
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
						<li><?php if ($_SESSION['id_jabatan'] == 1) { ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<?php
							if ($_SESSION['id_jabatan'] == 1) {
						?>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="report_absen.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<li><a href="list_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Shift</span></a></li>
						<li><a href="jadwal_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Jadwal Shift</span></a></li>
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
					<a href="index.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="list_shift.php">Shift</a></li>
			</ul>
			<?php 
				$username = $_SESSION['username'];
				$karyawan_id = $_SESSION['id_karyawan'];	
			?>
			<div class="row-fluid sortable">		
				<div class="box span8">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Jadwal Shift</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								<th>No.</th>	
								<th>Nama Karyawan</th>
								<th>Shift ke-</th>
								<th>Tanggal</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
								$no = "1";
								$row = $shift->getAll_shiftline();
								foreach ($row as $data) {
							?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data->nama_karyawan; ?></td>
								<td class="center"><?php echo $data->nama_shift; ?></td>
								<td class="center"><?php echo $data->tanggal_shift; ?></td>
							</tr>
							<?php } ?>
						  </tbody>
						</table>
						<form>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" id="addBtn">
									<i class="halflings-icon plus"></i> Tambah Shift
								</button>
							</div>
						</form>
						
						<div class="modal fade" id="modalAdd" role="dialog" data-backdrop="false">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Tambah Shift Karyawan</h4>
							  </div>
							  <form class="form-horizontal" method="POST">
								<fieldset>
								  <div class="modal-body">
									<div class="control-group">
									  <label class="control-label" for="typeahead">Dari</label>
										<div class="controls" id="datepicker">
											<input type="text" class="input datepicker" name="dari" required="required">
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="typeahead">Sampai</label>
										<div class="controls">
											<input type="text" class="input datepicker" name="sampai" required="required">
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="typeahead">Nama Karyawan</label>
									  <div class="controls">
										<select id="nama_karyawan" name="nama_karyawan">
											<option selected="selected"></option>
											<?php
												$baris = $karyawan->tampil_karyawan();
												foreach ($baris as $krywn) {
											?>
											<option value="<?php echo $krywn->id_karyawan; ?>"><?php echo $krywn->nama_karyawan; ?></option>
											<?php } ?>
										</select>
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="typeahead">Shift ke-</label>
									  <div class="controls">
										<select id="id_shift" name="id_shift">
											<option selected="selected"></option>
											<?php
												$show = $shift->tampil_shift();
												foreach ($show as $showID) {
											?>
											<option value="<?php echo $showID->id_shift; ?>"><?php echo $showID->nama_shift; ?></option>
											<?php } ?>
										</select>
									  </div>
									</div>
								  </div>
								  <div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="Simpan" name="save">
								  </div>
								</fieldset>
							  </form> 
							</div>
						  </div>
						</div>
						
						<script language="JavaScript">
							$(document).ready(function(){
								$("#addBtn").click(function(){
									$("#modalAdd").modal("show");
									$("#modalAdd").css("z-index", "1500");
								});
							});
						</script>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->
<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>