<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$report = new laporan();
	$karyawan = new karyawan();
	$shift = new shift();
	
	if ($user->loggedin() == "0") { 
		header("Location: index.php");
	} 
	
	$username = $_SESSION['username'];
	$karyawan_id = $_SESSION['id_karyawan'];	
	$id_jabatan = $_SESSION['id_jabatan'];	
	
	if (isset($_GET['delete'])) {
		$report_id = $_GET['delete'];
		$report->hapus_laporan($report_id);
		
		header("Location = laporan_user.php");
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
								<i class="halflings-icon white user"></i><?php echo $username; ?><span class="caret"></span>
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
						<li><?php if ($_SESSION['id_jabatan'] == 1) { ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="laporan_user.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<li><a href="absen_user.php"><i class="icon-user"></i><span class="hidden-tablet"> Absen</span></a></li>
						<?php
							$user_shift = $shift->tampil_shiftline($_SESSION['id_karyawan']);
							foreach ($user_shift as $all_shiftline) {
								$getUser = $all_shiftline->id_karyawan;				
							}
							if ($getUser == $_SESSION['id_karyawan']) { 
						?>
							<li><a href="shift_user.php"><i class="icon-time"></i><span class="hidden-tablet"> Jadwal Shift</span></a></li><?php } ?>
						<?php
							if ($_SESSION['id_jabatan'] == 1) {
						?>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
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
				<li><a href="laporan_user.php">Laporan</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span10">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon tasks"></i><span class="break"></span>Laporan</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Username</th>
								  <th>Tanggal</th>
								  <th>Subject</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
							$row = $report->laporan_list($karyawan_id);
							foreach ($row as $data) {
						  ?>
							<tr>
								<td><?php echo $data->username; ?></td>
								<td><?php echo tgl_indo($data->modify_date); ?></td>
								<td><?php echo $data->subject; ?></td>
								<td class="center">
								<?php 
									$tgl_db = tgl_indo($data->create_date);
									$hariini = tgl_indo(date('Y-m-d'));
									
									if ($tgl_db == $hariini && $data->state == 'draft') {
								?>
									<a class="btn btn-info" href="edit_laporan.php?id=<?php echo $data->id_laporan; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="#">
										<i class="halflings-icon white trash"></i> 
									</a><?php } else { ?>
									<a class="btn btn-success" href="detail_laporan.php?id=<?php echo $data->id_laporan; ?>">
										<i class="halflings-icon white zoom-in"></i>  
									</a>
									<a class="btn btn-danger" href="laporan_user.php?delete=<?php echo $data->id_laporan; ?>" onclick="if(!confirm('Are you sure?')){return false};">
										<i class="halflings-icon white trash"></i> 
									</a><?php } ?>
								</td>
							</tr><?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
		</div>
		<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>