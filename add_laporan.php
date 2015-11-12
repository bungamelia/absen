<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$report = new laporan();
	$shift = new shift();	
	
	$employee_id = $_SESSION['id_karyawan'];
	
	if ($user->loggedin() == "0") { 
		header("Location: index.php");
	} 
	
	$datatgl = $report->lastLaporan($employee_id);
	$tglreport = explode(" ", $datatgl->modify_date);
	$today = date('Y-m-d');

	if ($tglreport[0] == $today) {
		echo ("<script LANGUAGE='JavaScript'> window.alert('Laporan telah dibuat'); self.history.back(); </script>");
	}
	
	if (isset($_POST['draft'])) {
		$id_karyawan = $_SESSION['id_karyawan'];
		$id_jabatan = $_SESSION['id_jabatan'];
		$create_date = $_POST['waktu'];
		$modify_date = $_POST['waktu'];
		$subject = $_POST['subject'];
		$laporan = $_POST['laporan'];
		$state = 'draft';
		
		$report->add_laporan($id_karyawan, $id_jabatan, $create_date, $modify_date, $subject, $laporan, $state);
		if ($_SESSION['id_jabatan'] == 1) {
			header ("location: list_laporan.php");
		} else {
			header ("location: laporan_user.php");
		}
	}
	
	if (isset($_POST['publish'])) {
		$id_karyawan = $_SESSION['id_karyawan'];
		$id_jabatan = $_SESSION['id_jabatan'];
		$create_date = $_POST['waktu'];
		$modify_date = $_POST['waktu'];
		$subject = $_POST['subject'];
		$laporan = $_POST['laporan'];
		$state = 'publish';
		
		$report->add_laporan($id_karyawan, $id_jabatan, $create_date, $modify_date, $subject, $laporan, $state);
		if ($_SESSION['id_jabatan'] == 1) {
			header ("location: list_laporan.php");
		} else {
			header ("location: laporan_user.php");
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
						<li><?php if ($_SESSION['id_jabatan'] == 1) { ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
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
				<li><a href="admin.php">Dashboard</a></li>
			</ul>
			<?php 
				$username = $_SESSION['username'];
				$id_karyawan = $_SESSION['id_karyawan'];	
				$id_jabatan = $_SESSION['id_jabatan'];	
			?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="icon-home"></i><span class="break"></span>Laporan</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							<input type="hidden" name="waktu" value="<?php echo date('Y-m-d H:i:s');?>">
							<input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan;?>">
							<input type="hidden" name="id_jabatan" value="<?php echo $id_jabatan;?>">
							<div class="control-group">
							  <label class="control-label" for="typeahead">Subject</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="subject" required="required">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2"><?php echo tgl_indo(date('Y-m-d'));?></label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="laporan"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <input type="submit" class="btn" value="Save as Draft" name="draft">
							  <input type="submit" class="btn btn-primary" value="Save and Publish" name="publish">
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