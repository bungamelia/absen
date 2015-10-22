<?php
	include_once 'server.conf.php';
	include_once 'bootstrap/header.php';
	$user = new user();
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$passwd = $_POST['password'];
				
		if($user->login($username,$passwd)){
			$_SESSION['user_session'] = $username;
			header ("location: admin.php");
		}
		else{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Login gagal');
					self.history.back();
					</SCRIPT>");
		}
	}
	
	if($user->loggedin() == "1"){ 
		if($_SESSION['id_jabatan'] == "1"){
			header ("location: admin.php");
		}
		else{
			header ("location: user.php");
		}
	} 
?>
<style type="text/css">
	body {
  padding-top: 0px;
  padding-bottom: 0px;
  background: url("http://www.3benefitsof.com/wp-content/uploads/2013/12/Server-Rack.jpg") left fixed no-repeat;
}
</style>
</head>
<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						
					</div>
					<p>Login</p>
					<form class="form-horizontal" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="Username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="Password"/>
							</div>
							<div class="clearfix"></div>
							<div class="button-login">	
								<button class="btn btn-primary" type="submit" name="login">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3></h3>
					<p>
						
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
<script src="bootstrap/js/jquery-1.9.1.min.js"></script>
	<script src="bootstrap/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="bootstrap/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="bootstrap/js/jquery.ui.touch-punch.js"></script>
	
		<script src="bootstrap/js/modernizr.js"></script>
	
		<script src="bootstrap/js/bootstrap.min.js"></script>
	
		<script src="bootstrap/js/jquery.cookie.js"></script>
	
		<script src='bootstrap/js/fullcalendar.min.js'></script>
	
		<script src='bootstrap/js/jquery.dataTables.min.js'></script>

		<script src="bootstrap/js/excanvas.js"></script>
	<script src="bootstrap/js/jquery.flot.js"></script>
	<script src="bootstrap/js/jquery.flot.pie.js"></script>
	<script src="bootstrap/js/jquery.flot.stack.js"></script>
	<script src="bootstrap/js/jquery.flot.resize.min.js"></script>
	
		<script src="bootstrap/js/jquery.chosen.min.js"></script>
	
		<script src="bootstrap/js/jquery.uniform.min.js"></script>
		
		<script src="bootstrap/js/jquery.cleditor.min.js"></script>
	
		<script src="bootstrap/js/jquery.noty.js"></script>
	
		<script src="bootstrap/js/jquery.elfinder.min.js"></script>
	
		<script src="bootstrap/js/jquery.raty.min.js"></script>
	
		<script src="bootstrap/js/jquery.iphone.toggle.js"></script>
	
		<script src="bootstrap/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="bootstrap/js/jquery.gritter.min.js"></script>
	
		<script src="bootstrap/js/jquery.imagesloaded.js"></script>
	
		<script src="bootstrap/js/jquery.masonry.min.js"></script>
	
		<script src="bootstrap/js/jquery.knob.modified.js"></script>
	
		<script src="bootstrap/js/jquery.sparkline.min.js"></script>
	
		<script src="bootstrap/js/counter.js"></script>
	
		<script src="bootstrap/js/retina.js"></script>

		<script src="bootstrap/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>