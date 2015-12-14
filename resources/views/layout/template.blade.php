<?php
	use App\Http\Controllers\laporan\models\laporanModel;
	$today = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>.:: MCS ::.</title>

        <link href="resources/css/style.default.css" rel="stylesheet">
        <link href="resources/css/select2.css" rel="stylesheet" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        
        <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="index.html" class="logo">
                        <img src="resources/images/logo-primary.png" alt="" width="120" height="30" /> 
                    </a>
                    <div class="pull-right">
                        <a href="" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
                        <div class="btn-group btn-group-list btn-group-messages">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {{ laporanModel::getHari($today) }}, {{ laporanModel::tgl_indo($today) }}
                            </button>
                        </div><!-- btn-group -->                        
                        
                        <div class="btn-group btn-group-list btn-group-messages">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <div id="local"></div>
                            </button>
                        </div><!-- btn-group -->
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							@if (Auth::check())
								{{ Auth::user()->nama_karyawan }}
								<i class="fa fa-caret-down"></i>
							@endif
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li><a href="{{ url('profile') }}"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                              <li><a href="{{ url('register') }}"><i class="glyphicon glyphicon-star"></i> Activity Log</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                              <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                              <li class="divider"></li>
                              <li><a href="{{ url('logout') }}"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a></li>
                            </ul>
                        </div><!-- btn-group -->
                        
                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>
        
        <section>
			<div class="mainwrapper">
				<div class="leftpanel">
					<!-- <div class="media profile-left"></div>media -->
					
					<h5 class="leftpanel-title">Navigation</h5>
					<ul class="nav nav-pills nav-stacked">
						<li @if (Request::is('dashboard*')) class="active" @endif><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
						<li @if (Request::is('absen*')) class="active" @endif><a href="{{ url('absen') }}"><i class="fa fa-check-square"></i> <span>Absen</span></a></li>
						<li @if (Request::is('laporan*')) class="active" @endif><a href="{{ url('laporan') }}"><i class="fa fa-tasks"></i> <span>Laporan</span></a></li>
						<li @if (Request::is('pengumuman*')) class="active" @endif><a href="{{ url('pengumuman') }}">
						@if (count($getNotice) > "0")
						<span class="pull-right badge">{{ count($getNotice) }}</span>
						@endif
						<i class="fa fa-bookmark"></i> <span>Pengumuman</span></a></li>
						<li @if (Request::is('shift*')) class="active" @endif><a href="{{ url('shift') }}"><i class="fa fa-calendar-o"></i> <span>Jadwal Shift</span></a></li>
						<li @if (Request::is('pengaturan*')) class="active" @endif><a href="{{ url('pengaturan') }}"><i class="fa fa-cogs"></i> <span>Pengaturan</span></a></li>
					</ul>
				</div><!-- leftpanel -->
				
				@yield('content')
			</div><!-- mainwrapper -->
        </section>
		
		@yield('modals')
		
        <script src="resources/js/jquery-1.11.1.min.js"></script>
        <script src="resources/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="resources/js/jquery-ui-1.10.3.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/modernizr.min.js"></script>
        <script src="resources/js/pace.min.js"></script>
        <script src="resources/js/retina.min.js"></script>
        <script src="resources/js/jquery.cookies.js"></script>

        <script src="resources/js/ckeditor/ckeditor.js"></script>
        <script src="resources/js/ckeditor/adapters/jquery.js"></script>
        <script src="resources/js/select2.min.js"></script>

		<script src="resources/js/custom.js"></script>
		@yield('script')
		
        
        <script>
            jQuery(document).ready(function(){
              jQuery('#BuatLaporan').ckeditor();
              jQuery('#EditLaporan').ckeditor();
              jQuery('#Catatan').ckeditor();
              jQuery('#datepicker').datepicker();
            });
            function updTime() {
                var f = new Date();
                document.getElementById('local').innerHTML =  f.toLocaleTimeString();
                document.getElementById('universal').innerHTML = f.toUTCString();   
            }
                function startClock() {
                setInterval(function () { updTime() }, 1000);
            }
            startClock();
        </script>
    </body>
</html>
