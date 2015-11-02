<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$karyawan = new karyawan();
	$shift = new shift();
	
	if ($user->loggedin() == "0") { 
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
						<li><?php if ($_SESSION['id_jabatan'] == 1) { ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<?php
							if ($_SESSION['id_jabatan'] == 1) {
						?>	
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="report_absen.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<li><a href="list_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Shift</span></a></li>
						<?php } else{ ?>
						<li><a href="laporan_user.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<li><a href="absen_user.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<?php
							$user_shift = $shift->tampil_shiftline($_SESSION['id_karyawan']);
							foreach ($user_shift as $all_shiftline) {
								$getUser = $all_shiftline->id_karyawan;				
							}
							if ($getUser == $_SESSION['id_karyawan']) { 
						?>
						<li><a href="shift_user.php"><i class="icon-time"></i><span class="hidden-tablet"> Jadwal Shift</span></a></li><?php } }?>
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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="detail_karyawan.php?id=<?php echo $karyawan_id; ?>">Karyawan</a></li>
			</ul>
			<?php 
				$employee_id = $_GET['id'];
				$data = $karyawan->getID_karyawan($employee_id);
			?>
			<div class="row-fluid sortable">
				<div class="box span7">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span><?php echo $data->username; ?></h2>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <tbody>
								<tr>
								<?php if ($data->foto == "") { ?>
									<td rowspan="7" align="center"><img class="grayscale" src="http://www.gamesindustry.biz/img/base/default-user.png" alt="Sample Image 1"></td>
								<?php } else { ?>
									<td rowspan="7" align="center"><img class="grayscale" width="245" height="250" src="bootstrap/foto_profile/<?php echo $data->foto; ?>" alt="Sample Image 1"></td>
								<?php } ?>
								</tr>
								<tr>
									<td><b>Nama Karyawan:</b></td>
									<td><?php echo $data->nama_karyawan; ?></td>                                     
								</tr>
								<tr>
									<td><b>Jabatan:</b></td>
									<td><?php echo $data->nama_jabatan; ?></td>                                     
								</tr>
								<tr>
									<td><b>Email:</b></td>
									<td><?php echo $data->email; ?></td>                                     
								</tr>
								<tr>
									<td><b>Alamat:</b></td>
									<td><?php echo $data->alamat; ?></td>                                      
								</tr>
								<tr>
									<td><b>Tempat, tanggal lahir:</b></td>
									<td><?php echo $data->ttl; ?></td>                                       
								</tr>
								<tr>
									<td><b>Jenis Kelamin</b></td>
									<td><?php echo $data->jenis_kelamin; ?></td>                                       
								</tr>                            
							  </tbody>
						 </table>  
						 <?php 
							if ($username == $data->username) { ?>
							<div class="form-actions">
								<a href="edit_karyawan.php?id=<?php echo $karyawan_id; ?>" class="btn btn-primary">Edit Profile</a>
								<a href="edit_password.php?id=<?php echo $karyawan_id; ?>" class="btn btn-primary">Ganti Password</a>
							</div>
						 <?php } ?>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>