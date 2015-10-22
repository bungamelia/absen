<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$karyawan = new karyawan();
	
	if($user->loggedin() == "0"){ 
		header("Location = index.php");
	} 
	
	$username = $_SESSION['username'];
	$karyawan_id = $_SESSION['id_karyawan'];	
	$id_jabatan = $_SESSION['id_jabatan'];	
	
	if(isset($_POST['ganti'])){
		$karyawan_id = $_SESSION['id_karyawan'];
		$id_jabatan = $_SESSION['id_jabatan'];
		$new_pass = $_POST['new_pass'];
		
		$karyawan->edit_password($karyawan_id, $id_jabatan, $new_pass);
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
						<li><?php if($_SESSION['id_jabatan'] == 1){ ?><a href="admin.php"><?php } else { ?><a href="user.php"><?php } ?>
						<i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<?php
							if($_SESSION['id_jabatan'] == 1){
						?>
						<li><a href="list_laporan.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Laporan</span></a></li>
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
						<h2><i class="icon-lock"></i><span class="break"></span>Ganti Password</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							<?php
								if(isset($_POST['ganti'])){
									if($_POST['new_pass'] != $_POST['confirm_pass']){
							?>
							<div class="control-group error">
								<div class="controls">
								  <span class="help-inline">Password tidak sama</span>
								</div>
								</div><?php } } ?>
							<div class="control-group">
								<label class="control-label">Password Baru</label>
								<div class="controls">
								  <input type="password" name="new_pass" required="required">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Confirm Password</label>
								<div class="controls">
								  <input type="password" name="confirm_pass" required="required">
								</div>
							</div>
							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Save" name="ganti">
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