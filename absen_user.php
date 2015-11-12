<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	$absen = new absen();
	$karyawan = new karyawan();
	$shift = new shift();
	
	if ($user->loggedin() == "0") { 
		header("Location: index.php");
	} 
	
	$username = $_SESSION['username'];
	$karyawan_id = $_SESSION['id_karyawan'];	
	$id_jabatan = $_SESSION['id_jabatan'];	
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
					<a href="admin.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="absen_user.php">Absen</a></li>
			</ul>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Absen</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>No.</th>
								  <th>Tanggal</th>
								  <th>Jam</th>
								  <th>Status</th>
								  <th>Keterlambatan</th>
								  <th>Foto</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php 
							$row = $absen->absen_list($karyawan_id);
							$no=1;
							foreach ($row as $data) {
						  ?>
							<tr>
								<td><?php echo $no++."."; ?></td>
								<td><?php echo tgl_indo($data->waktu); ?></td>
								<?php 
									$jam_masuk = jam($data->waktu);
									if ($data->id_shift == "1") {
										if ($data->status == "masuk" && $jam_masuk >= date('00:01:00') && $jam_masuk < date('00:15:00')) { ?>
											<td class="green"><?php echo jam($data->waktu); ?></td><?php 
										} elseif($data->status == "masuk" && $jam_masuk >= date('00:15:00') && $jam_masuk < date('00:30:00')) { ?>
											<td class="yellow"><?php echo jam($data->waktu); ?></td><?php  
										} elseif($data->status == "masuk" && $jam_masuk >= date('00:30:00') && $jam_masuk < date('09:00:00')) { ?>
											<td class="red"><?php echo jam($data->waktu); ?></td><?php 
										} else { ?>
											<td><?php echo jam($data->waktu); ?></td><?php 
										} 
									} elseif ($data->id_shift == "2" || $data->id_shift == "4") { 
										if ($data->status == "masuk" && $jam_masuk >= date('09:01:00') && $jam_masuk < date('09:15:00')) { ?>
											<td class="green"><?php echo jam($data->waktu); ?></td><?php 
										} elseif ($data->status == "masuk" && $jam_masuk >= date('09:15:00') && $jam_masuk < date('09:30:00')) { ?>
											<td class="yellow"><?php echo jam($data->waktu); ?></td><?php
										} elseif($data->status == "masuk" && $jam_masuk >= date('09:30:00')) { ?>
											<td class="red"><?php echo jam($data->waktu); ?></td><?php
										} else { ?>
											<td><?php echo jam($data->waktu); ?></td><?php 
										} 
									} else { 
										if ($data->status == "masuk" && $jam_masuk >= date('16:01:00') && $jam_masuk < date('16:15:00')) { ?>
											<td class="green"><?php echo jam($data->waktu); ?></td><?php 
										} elseif($data->status == "masuk" && $jam_masuk >= date('16:15:00') && $jam_masuk < date('16:30:00')) { ?>
											<td class="yellow"><?php echo jam($data->waktu); ?></td><?php 
										} elseif($data->status == "masuk" && $jam_masuk >= date('16:30:00') && $jam_masuk < date('01:00:00')) { ?>
											<td class="red"><?php echo jam($data->waktu); ?></td><?php
										} else { ?>
											<td><?php echo jam($data->waktu); ?></td><?php 
										} 
									} ?>
								<td><?php echo $data->status; ?></td>
								<?php 
									if ($data->id_shift == "1") {
										$shiftID = "1";
										$rowID = $shift->getID_shift($shiftID); ?>
										<td><?php if ($data->status == "masuk"){ echo get_time_difference($rowID->start_shift, $jam_masuk); } ?></td><?php 
									} elseif ($data->id_shift == "2" || $data->id_shift == "4") { 
										$shiftID = "2";
										$rowID = $shift->getID_shift($shiftID); ?>
										<td><?php if ($data->status == "masuk"){ echo get_time_difference($rowID->start_shift, $jam_masuk); } ?></td><?php
									} else { 
										$shiftID = "3";
										$rowID = $shift->getID_shift($shiftID); ?>
										<td><?php if ($data->status == "masuk"){ echo get_time_difference($rowID->start_shift, $jam_masuk); } ?></td><?php 
									} 
								?>
								<td>
								<?php if ($data->status == "masuk"){
									$tgl = explode(" ", $data->waktu);
									$tgl1 = explode("-", $tgl[0]); ?>
									
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" id="myBtn">
									 <i class="halflings-icon white zoom-in"></i>
									</button>

									<!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog" data-backdrop="false">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="myModalLabel">Modal title</h4>
										  </div>
										  <div class="modal-body">
											<img src=uploads/<?php echo $karyawan_id . "/" . $tgl1[0]. "/"  .$tgl1[1] . "/" . $tgl1[2] . "/" . $karyawan_id ."-". $tgl1[2] ."-". $tgl1[1] ."-". $tgl1[0] .".jpeg" ?>>
										  </div>
										  <div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  </div>
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
								<?php } ?></td>
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