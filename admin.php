<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$absen = new absen();
	$karyawan = new karyawan();
	$notice = new notice();
	$shift = new shift();
	
	if ($user->loggedin() == "0") { 
		header ("location: index.php");
	} 
	
	if ($_SESSION['id_jabatan'] != 1) {
		header ("location: index.php");
	}
	
	$employee_id = $_SESSION['id_karyawan'];
	
	if (isset($_POST['masuk'])) {
		$tahun 		= date('Y');
		$bulan 		= date('m');
		$tanggal 	= date('d');
		$path 		= "uploads/".$_SESSION['id_karyawan']."/".$tahun."/".$bulan."/".$tanggal; 
		$data 		= base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['foto_absen']));
		makeDir($path);
		file_put_contents("{$path}/{$_SESSION['id_karyawan']}-".date('d-m-Y').".jpeg", $data);
		
		$id_karyawan = $_SESSION['id_karyawan'];
		$waktu = $_POST['waktu'];
		$status = 'masuk';
		
		$absen->add_absen($id_karyawan, $waktu, $status);
	}
	
	if (isset($_POST['keluar'])) {
		$id_karyawan = $_SESSION['id_karyawan'];
		$waktu = $_POST['waktu'];
		$status = 'keluar';
		
		$absen->add_absen($id_karyawan, $waktu, $status);
		
		header ("Location: admin.php");
	}
	
	if (isset($_POST['notice'])) {
		$nama_karyawan = $_POST['nama_karyawan'];
		$isi = $_POST['isi'];
		$tanggal = $_POST['tanggal'];
		
		$notice->add_notice($nama_karyawan, $isi, $tanggal);
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
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
						<?php
							if ($_SESSION['id_jabatan'] == 1) {
						?>
						<li><a href="list_karyawan.php"><i class="icon-user"></i><span class="hidden-tablet"> Karyawan</span></a></li>
						<li><a href="report_absen.php"><i class="icon-check"></i><span class="hidden-tablet"> Absen</span></a></li>
						<li><a href="list_shift.php"><i class="icon-time"></i><span class="hidden-tablet"> Shift</span></a></li>
						<?php } ?>
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
				<li><a href="admin.php">Dashboard</a></li>
			</ul>
			<?php 
				$username = $_SESSION['username'];
				$id_karyawan = $_SESSION['id_karyawan'];
			?>
			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header">
						<h2><i class="icon-home"></i><span class="break"></span>Selamat datang, <?php echo $username; ?> </h2>
					</div>
					<div class="box-content">
						<div class="row-fluid">
							<div class="masonry-gallery">
							<form method="POST">
								<div id="image-1" class="masonry-thumb">
									<div id="results">
									<?php
										$state = $absen->getID_absen($employee_id);
										if ($state->status == "masuk") {
											$date = explode(" ", $state->waktu);
											$tanggal = explode("-", $date[0]);
											$tgl_foto = $tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
											$hariini = date('d-m-Y');
											
											if ($tgl_foto == $hariini) {
												$filename = "uploads/".$state->id_karyawan."/".tahun($state->waktu)."/".bulan($state->waktu)."/".tanggal($state->waktu)."/".$state->id_karyawan."-".$tgl_foto.".jpeg";
												if (file_exists($filename)) { ?>
													<img class="grayscale" src="<?php echo $filename;?>" alt="Sample Image 1"></a><?php 
												}
											} else { ?>
												<img class="grayscale" src="http://www.gamesindustry.biz/img/base/default-user.png" alt="Sample Image 1"></a><?php
											}
										} else { ?>
											<img class="grayscale" src="http://www.gamesindustry.biz/img/base/default-user.png" alt="Sample Image 1"></a><?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							  <input type="hidden" name="waktu" value="<?php echo date('Y-m-d H:i:s');?>">
							  <?php
								$data = $absen->getID_absen($id_karyawan);
								$tgl_db = tgl_indo($data->waktu);
								$hariini = tgl_indo(date('Y-m-d'));
								
								$date_add = date('Y-m-d H:i:s',strtotime('+18 hours',strtotime($data->waktu)));
								
								if ($data->status == "keluar") { ?>
									<input type="submit" class="btn btn-primary" name="masuk" value="Absen Masuk">
								<?php 
								} elseif($data->status == "masuk" && $tgl_db != $hariini) {
									$id_karyawan = $_SESSION['id_karyawan'];
									$waktu = $date_add;
									$status = "keluar";
									$absen->add_absen($id_karyawan, $waktu, $status);	?>
									<input type="submit" class="btn btn-primary" name="masuk" value="Absen Masuk">
								<?php
								} elseif($data->status == "masuk" && $tgl_db == $hariini) { ?>
									<input type="submit" class="btn btn-primary" name="keluar" value="Absen Keluar"><?php } ?>
							  <a class="btn btn-primary" href="add_laporan.php" >Laporan</a>
							</form>
						</div>
					</div>
				</div><!--/span-->
				<div class="box span4" onTablet="span6" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon envelope"></i><span class="break"></span>Notice</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
						<?php
							$datas = $notice->tampil_notice();
							foreach ($datas as $rows) {
						?>
							<li>
								<strong>Name Karyawan:</strong> <?php echo $rows->nama_karyawan; ?><br>
								<strong>Tanggal:</strong> <?php echo tgl_indo($rows->tanggal); ?><br>
								<strong>Isi:</strong> <?php echo $rows->isi; ?>                               
							</li>
							<?php } ?>
						</ul>
						<div class="chat-form">
						<form method="post">
							<input type="hidden" name="tanggal" value="<?php echo date('Y-m-d H:i:s');?>">
							<select name="nama_karyawan">
							<?php
								$baris = $karyawan->nama_karyawan($_SESSION['username']);
								foreach ($baris as $krywn) {
							?>
							<option value="<?php echo $krywn->id_karyawan; ?>"><?php echo $krywn->nama_karyawan; ?></option>
							<?php } ?>
							</select>
							<textarea name="isi"></textarea>
							<input type="submit" class="btn btn-info" value="Send" name="notice">
						</form>
						</div>
					</div>
				</div><!--/span-->
				<?php
					error_reporting(0);
					if (!file_exists($filename)) {
				?>
				<div class="box span4 noMargin" onTablet="span12" onDesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon check"></i><span class="break"></span>Absen Foto</h2>
					</div>
					<div class="box-content">
						<div class="todo">
							<div id="my_camera"></div>
							<!-- First, include the Webcam.js JavaScript Library -->
							<script type="text/javascript" src="bootstrap/js/webcam.js"></script>
						
							<!-- Configure a few settings and attach camera -->
							<script language="JavaScript">
								Webcam.set({
									width: 320,
									height: 240,
									image_format: 'jpeg',
									jpeg_quality: 90
								});
								Webcam.attach( '#my_camera' );
							</script>
						
							<!-- A button for taking snaps -->
							<form>
								<button type="button" class="btn btn-primary" onClick="take_snapshot()">Take Snapshot</button>
							</form>
							
							<!-- Code to handle taking the snapshot and displaying it locally -->
							<script language="JavaScript">
								function take_snapshot() {
									// take snapshot and get image data
									Webcam.snap( function(data_uri) {
										// display results in page
										document.getElementById('results').innerHTML = 
											'<img class="grayscale" src="'+data_uri+'"/>'+
											'<input type="hidden" name="foto_absen" value="'+data_uri+'"/>';
									} );
								}
							</script>
						</div>	
					</div>
				</div>
					<?php } ?>
			</div><!--/row-->
			</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	<div class="clearfix"></div>
<?php include_once 'bootstrap/footer.php'; ?>