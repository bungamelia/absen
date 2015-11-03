<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$shift = new shift();
	
	if ($user->loggedin() == "0") { 
		header("Location = index.php");
	} 

	$employee_id = $_SESSION['id_karyawan'];
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
						<li><a href="laporan_user.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<li><a href="absen_user.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<?php
							$user_shift = $shift->tampil_shiftline($_SESSION['id_karyawan']);
							foreach ($user_shift as $all_shiftline) {
								$getUser = $all_shiftline->id_karyawan;				
							}
							if ($getUser == $_SESSION['id_karyawan']) { 
						?>
						<li><a href="shift_user.php"><i class="icon-time"></i><span class="hidden-tablet"> Jadwal Shift</span></a></li><?php } ?>
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
				$karyawan_id = $_SESSION['id_karyawan'];	?>
			<div class="row-fluid sortable">		
				<div class="box span4">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon time"></i><span class="break"></span>Jadwal Shift</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable">
						  <thead>
							  <tr>
								  <th>Shift ke-</th>
								  <th>Tanggal</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php
							$shiftl = $shift->tampil_shiftline($_SESSION['id_karyawan']);
							foreach ($shiftl as $line) {
						  ?>
							<tr>
								<?php
								$tgl_db = tgl_indo($line->tanggal_shift);
								$hariini = tgl_indo(date('Y-m-d'));
								
								if ($tgl_db == $hariini) { ?>
								<td class="yellow"><?php echo $line->nama_shift; ?></td>
								<td class="yellow"><?php echo tgl_indo($line->tanggal_shift); ?></td>
								<?php } else { ?>
								<td><?php echo $line->nama_shift; ?></td>
								<td><?php echo tgl_indo($line->tanggal_shift); ?>
							</tr><?php } } ?>
						  </tbody>
						</table>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
			</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->
<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>