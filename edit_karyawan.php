<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$karyawan = new karyawan();
	
	if ($user->loggedin() == "0") { 
		header("Location = index.php");
	} 
		
	$username = $_SESSION['username'];
	$karyawan_id = $_SESSION['id_karyawan'];	
	$id_jabatan = $_SESSION['id_jabatan'];	
	
	if (isset($_POST['update'])) {
		$karyawan_id = $_SESSION['id_karyawan'];
		$id_jabatan = $_SESSION['id_jabatan'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$tempat = $_POST['tempat'];
		$tanggal = explode("/", $_POST['tanggal']);
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		
		$ttl = $tempat.", ".$tanggal[1]."-".$tanggal[0]."-".$tanggal[2];
		
		$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="bootstrap/foto_profile/";

		// new file size in KB
		$new_size = $file_size/1024;

		// make file name in lower case
		$new_file_name = strtolower($file);
		$final_file = str_replace(' ','-',$new_file_name);

		if (move_uploaded_file($file_loc,$folder.$final_file)) {
			$karyawan->edit_karyawan($karyawan_id, $id_jabatan, $nama_karyawan, $alamat, $email, $ttl, $final_file);
		} else {
			echo "fail";
		}
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
						<li><a href="shift_user.php"><i class="icon-time"></i><span class="hidden-tablet"> Jadwal Shift</span></a></li><?php } } ?>
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
			<li><a href="detail_karyawan.php?id=<?php echo $karyawan_id; ?>">Karyawan</a></li>
		</ul>
		<?php 
			$data = $karyawan->getID_karyawan($karyawan_id);
		?>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header">
					<h2><i class="icon-tasks"></i><span class="break"></span>Laporan</h2>
				</div>
				<div class="box-content">
					<form class="form-horizontal" method="POST" enctype="multipart/form-data">
					  <fieldset>
						<div class="control-group">
							<label class="control-label">Username</label>
							<div class="controls">
							  <input type="text" name="userkaryawan" value="<?php echo $data->username; ?>" required="required" disabled="">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Nama Karyawan</label>
							<div class="controls">
							  <input type="text" name="nama_karyawan" value="<?php echo $data->nama_karyawan; ?>" required="required">
							</div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="typeahead">Jabatan</label>
						  <div class="controls">
							<input type="text" name="subject" value="<?php echo $data->nama_jabatan; ?>" disabled="">
						  </div>
						</div>
						<?php
							$ttl=explode(", ",$data->ttl);
							$tgl = explode("-",$ttl[1]);
						?>
						<div class="control-group">
							<label class="control-label">Tempat lahir</label>
							<div class="controls">
							  <input type="text" name="tempat" value="<?php echo $ttl[0]; ?>" required="required">
							</div>
						</div>
						<div class="control-group" >
						  <label class="control-label" for="date01">Tanggal lahir</label>
						  <div class="controls">
							<input type="text" class="input datepicker" name="tanggal" value="<?php echo $tgl[1]."/".$tgl[0]."/".$tgl[2]; ?>" required="required">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="textarea2">Alamat</label>
						  <div class="controls">
							<textarea name="alamat"><?php echo $data->alamat; ?></textarea>
						  </div>
						</div>
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
							  <input type="text" name="email" value="<?php echo $data->email; ?>" required="required">
							</div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="fileInput">Foto Profile</label>
						  <div class="controls">
							<input class="input-file uniform_on" name="file" type="file">
						  </div>
						</div>
						<div class="form-actions">
						  <input type="submit" class="btn btn-primary" value="Save" name="update">
						  <button class="btn" onclick="goBack()">Cancel</button>
						  <script>
							function goBack() {
								window.history.back();
							}
						  </script>
						</div>
					  </fieldset>
					</form>   
				</div>
			</div><!--/span-->
		</div><!--/row-->
		</div><!--/.fluid-container-->
		<!-- end: Content -->
	</div><!--/#content.span10-->
</div><!--/fluid-row-->
	<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>