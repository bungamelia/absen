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
	
	if (isset($_POST['save_shift'])) {
		$nama_shift = $_POST['nama_shift'];
		$start_shift = $_POST['start_shift'];
		$end_shift = $_POST['end_shift'];
		
		$shift->add_shift($nama_shift, $start_shift, $end_shift);
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Shift</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Nama Shift</th>
								  <th>Start Shift</th>
								  <th>End Shift</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
								$row = $shift->tampil_shift();
								foreach ($row as $data) {
							?>
							<tr>
								<td><?php echo $data->nama_shift; ?></td>
								<td class="center"><?php echo $data->start_shift; ?></td>
								<td class="center"><?php echo $data->end_shift; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_shift.php?id=<?php echo $data->id_shift; ?>">
										<i class="halflings-icon white edit"></i>
									</a>
									<a class="btn btn-danger" href="list_shift.php?delete=<?php echo $data->id_shift; ?>" onclick="return confirm('Are you sure?')">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
						</table>
						<form>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="myBtn">
									<i class="halflings-icon plus"></i> Tambah Shift
								</button>
							</div>
						</form>
						<div class="modal fade" id="myModal" role="dialog" data-backdrop="false">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Tambah Shift</h4>
							  </div>
							  <form class="form-horizontal" method="POST">
								<fieldset>
								  <div class="modal-body">
									<div class="control-group">
									  <label class="control-label" for="typeahead">Nama Shift</label>
										<div class="controls">
											<input type="text" name="nama_shift">
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="typeahead">Start Shift</label>
										<div class="controls">
											<input type="text" name="start_shift" placeholder="hh:mm:ss">
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="typeahead">End Shift</label>
									  <div class="controls">
										<input type="text" name="end_shift" placeholder="hh:mm:ss">
									  </div>
									</div>
								  </div>
								  <div class="modal-footer">
									<input type="submit" class="btn btn-primary" value="Simpan" name="save_shift">
								  </div>
								</fieldset>
							  </form> 
							</div>
						  </div>
						</div>
						
						<script language="JavaScript">
							$(document).ready(function(){
								$("#myBtn").click(function(){
									$("#myModal").modal("show");
									$("#myModal").css("z-index", "1500");
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