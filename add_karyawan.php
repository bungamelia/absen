<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$karyawan = new karyawan();
	$absen = new absen();
	
	if ($user->loggedin() == "0") { 
		header("Location = index.php");
	} 
	
	if ($_SESSION['id_jabatan'] != 1) {
		header ("location: index.php");
	}
	
	$employee_id = $_SESSION['id_karyawan'];
	
	if (isset($_POST['submit'])) {
		$userkaryawan = $_POST['userkaryawan'];
		$password = $_POST['password'];
		$nama_karyawan = $_POST['nama_karyawan'];
		$jabatan = $_POST['jabatan'];
		$tempat = $_POST['tempat'];
		$tanggal = explode("/", $_POST['tanggal']);
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$email = $_POST['email'];
		
		$ttl = $tempat.", ".$tanggal[1]."-".$tanggal[0]."-".$tanggal[2];
		
		if(strlen($userkaryawan) < 3) {
			$error[] = 'Username is too short.';
		} else {
			$karyawan->cek_username($userkaryawan);
		}
		
		if (strlen($password) < 3) {
			$error[] = 'Password is too short.';
		}
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[] = 'Please enter a valid email address';
		} else {
			$karyawan->cek_email($email);
		}
		
		if (!isset($error)) {
			try {
				$karyawan->add_karyawan($userkaryawan, $nama_karyawan, $jabatan, $ttl, $alamat, $jenis_kelamin, $email, $password);
				$getuser = $karyawan->user_karyawan($userkaryawan);
				$getidkry = $getuser->id_karyawan;
				$waktu = date('Y-m-d H:i:s');
				$status = "keluar";
				$absen->add_absen($getidkry, $waktu, $status);
			}
			catch (PDOException $e) {
				echo $e->getMessage();
			}
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
						<li><a href="admin.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<?php
							if ($_SESSION['id_jabatan'] == 1) {
						?>	
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="report_absen.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<li><a href="list_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Shift</span></a></li>
						<?php } else { ?>
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
				<li><a href="list_karyawan.php">Karyawan</a></li>
			</ul>
			<?php 
				$username = $_SESSION['username'];
				$id_karyawan = $_SESSION['id_karyawan'];
			?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-user"></i><span class="break"></span>Tambah Karyawan</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							<div class="control-group">
								<label class="control-label">Username</label>
								<div class="controls">
								  <input type="text" name="userkaryawan" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password</label>
								<div class="controls">
								  <input type="password" name="password" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Nama Karyawan</label>
								<div class="controls">
								  <input type="text" name="nama_karyawan" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Jabatan</label>
								<div class="controls">
								  <select id="jabatan" name="jabatan">
								  <?php 
									$baris = $karyawan->getID_jabatan();
									foreach ($baris as $jbtn) {
								  ?>
									<option name="jabatan" value="<?php echo $jbtn->id_jabatan; ?>"><?php echo $jbtn->nama_jabatan; ?></option>
									<?php } ?>
								  </select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tempat lahir</label>
								<div class="controls">
								  <input type="text" name="tempat" required="required">
								</div>
							</div>
							<div class="control-group" >
							  <label class="control-label" for="date01">Tanggal lahir</label>
							  <div class="controls">
								<input type="text" class="input datepicker" name="tanggal" id="date01" required="required">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Alamat</label>
							  <div class="controls">
								<textarea name="alamat"></textarea>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectError3">Jenis Kelamin</label>
								<div class="controls">
								  <select id="jenis_kelamin" name="jenis_kelamin">
								  <?php 
									$row = $karyawan->getID_jk();
									foreach ($row as $data) {
								  ?>
									<option name="jenis_kelamin" value="<?= echo $data->id_jenis_kelamin; ?>" ><?= echo $data->jenis_kelamin; ?></option>
									<?= } ?>
								  </select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Email</label>
								<div class="controls">
								  <input type="text" name="email" required="required">
								</div>
							</div>
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save" name="submit">
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