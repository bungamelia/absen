<?php
	use App\Http\Controllers\laporan\models\laporanModel;
?>
@extends('layout/template')
@section('content')
	<div class="mainpanel">
		<div class="pageheader">
			<div class="media">
				<div class="pageicon pull-left">
					<i class="fa fa-home"></i>
				</div>
				<div class="media-body">
					<ul class="breadcrumb">
						<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
						<li>Dashboard</li>
					</ul>
					<h4>Dashboard</h4>
				</div>
			</div><!-- media -->
		</div><!-- pageheader -->
		
		<div class="contentpanel">
			
			<div class="row row-stat">
				<div class="col-md-6">
					<div class="panel panel-success-alt noborder">
						<div class="panel-heading noborder">
							
							<div class="panel-icon"><i class="fa fa-check-square-o"></i></div>
							<div class="media-body">
								<h5 class="md-title nomargin">Absensi</h5>
								<h1 class="mt5">
									@if ($absen->status == "keluar")
									<a href="#" class="btn btn-primary btn-metro" data-toggle="modal" data-target=".AbsenMasuk">
										Absen Masuk
									</a>
									@else
									<a href="#" class="btn btn-primary btn-metro" data-toggle="modal" data-target=".AbsenKeluar">
										Absen Keluar
									</a>
									@endif									
									@if (empty($report))
									<a href="#" class="btn btn-primary btn-metro" data-toggle="modal" data-target=".BuatLaporan">
										Buat Laporan
									</a>									
									@endif
									<a href="#" class="btn btn-primary btn-metro" data-toggle="modal" data-target=".EditLaporan">
										Edit Laporan
									</a>
								</h1>
							</div><!-- media-body -->
							<hr>
							<div class="clearfix mt20">
								<div class="pull-left">
									<h5 class="md-title nomargin">Absen Terakhir</h5>
									<h4 class="nomargin">{{ laporanModel::tgl_indo($absen->created_at)}}</h4>
								</div>
								<div class="pull-right">
									<h5 class="md-title nomargin">&#160;</h5>
									<h4 class="nomargin">{{ laporanModel::jam($absen->created_at)}}</h4>
								</div>
							</div>
						</div><!-- panel-body -->
					</div><!-- panel -->
				</div><!-- col-md-6 -->
				
				<div class="col-md-6">
					<div class="panel panel-primary noborder">
						<div class="panel-heading noborder">
							<div class="panel-icon"><i class="fa fa-users"></i></div>
							<div class="media-body">
								<h5 class="md-title nomargin">Jadwal Shift</h5>
								<h1 class="mt5">@if (empty($shiftLine)) Libur @else {{ $shiftLine->nama_shift }} @endif
									<a href="{{ url('shift') }}" class="btn btn-success btn-metro">
										Jadwal Lengkap
									</a></h1>
							</div><!-- media-body -->
							<hr>
							<div class="clearfix mt20">
								<div class="pull-left">
									<h5 class="md-title nomargin">Kemarin</h5>
									<h4 class="nomargin">@if (empty($shiftKmrn)) Libur @else {{ $shiftKmrn->nama_shift }} @endif</h4>
								</div>
								<div class="pull-right">
									<h5 class="md-title nomargin">Besok</h5>
									<h4 class="nomargin">@if (empty($shiftBesok)) Libur @else {{ $shiftBesok->nama_shift }} @endif</h4>
								</div>
							</div>
						</div><!-- panel-body -->
					</div><!-- panel -->
				</div><!-- col-md-6 -->
				
			</div><!-- row -->
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<div style="display: none;" class="panel-btns">
						<a data-original-title="Minimize Panel" href="" class="panel-minimize tooltips" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></a>
					</div><!-- panel-btns -->
					<h4 class="panel-title">Catatan</h4>
				</div><!-- panel-heading -->
				<div class="panel-body">
					@if (empty($note))
					<form method="POST" action="{{ url('catatan') }}">
					{{ csrf_field() }}
						<div class="form-group">
							<textarea id="Catatan" name="content" class="form-control" rows="10"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-metro btn-success" value="Simpan">
						</div>
					</form>
					@else
					<form method="POST" action="<?php echo "catatan/".$note->id."/edit"; ?>">
					{{ csrf_field() }}
						<div class="form-group">
							<textarea id="Catatan" name="content" class="form-control" rows="10">{{ htmlentities($note->content) }}</textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-metro btn-success" value="Simpan">
						</div>
					</form>
					@endif
				</div>
			</div>
			
		</div><!-- contentpanel -->
		
	</div><!-- mainpanel -->
@endsection

@section('modals')
<!-- modals -->
<?php
	$id = Auth::user()->id_karyawan;
	$filename = "uploads/".$id."/".date("Y")."/".date("m")."/".date("d")."/".$id."-".date("d-m-Y").".jpeg";
?>
@if (file_exists($filename))
<div class="modal fade AbsenKeluar" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
			  <h4 class="modal-title">Foto Absen Masuk</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					<img class="grayscale" src="<?php echo $filename;?>"></a>
				</div>
			</div>
		  </div>
		  <form action="{{ url('keluar') }}" method="POST">
		  {{ csrf_field() }}
		  @if (!empty($shiftLine))
			<input type="hidden" name="id_shift" value="{{ $shiftLine->id_shift }}" >
		  @endif
		  @if (!empty($report))
			<input type="hidden" name="id_laporan" value="{{ $report->id_laporan }}" >
		  @endif
		  <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Absen Keluar</button>
	      </div>
	  </form>
	  </div>
	</div>
</div>

@else
<div class="modal fade AbsenMasuk" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
			  <h4 class="modal-title">Ambil Foto Absen Masuk</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					<div id="my_camera"></div>
				</div>
				<form action="{{ url('upload') }}" method="POST">
				{{ csrf_field() }}
				@if (!empty($shiftLine))
					<input type="hidden" name="id_shift" value="{{ $shiftLine->id_shift }}" >
				@endif
				<div class="col-sm-6">
					<div id="results"></div>	
				</div>

				<!-- First, include the Webcam.js JavaScript Library -->
				<script type="text/javascript" src="resources/js/webcam.js"></script>
			
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
				<style type="text/css">
					.hide{display: none;}
				</style>
					
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
						$( "#rm" ).removeClass( "hide" );
						$( "#ph" ).addClass( "disabled hide" );
					}
				</script>
			</div>
		  </div>
		  <div class="modal-footer">
		        <button type="button" id="ph" class="btn btn-default" onClick="take_snapshot()">Take Photo</button>
		        <button type="submit" id="rm" class="btn btn-primary hide">Absen Masuk</button>
	      </div>
	  </div>
	</div>
</div>
</form>
@endif

<div class="modal fade EditLaporan" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
			  <h4 class="modal-title">Edit Laporan Hari ini</h4>
		  </div>
		  <div class="modal-body">
		  @if (!empty($report))
		  	<form method="POST" action="<?php echo "catatan/".$report->id."/edit"; ?>">
		  	{{ csrf_field() }}
		  	@if ($report->state != "Publish")
			  <div class="form-group">
					<textarea id="EditLaporan" name="content" class="form-control" rows="10">{{ $report->content }}</textarea>
			  </div>
			  <div class="form-group">
					<input type="submit" name="publish" class="btn btn-metro btn-primary" value="Publish">				
			  </div>
			@else
			  <div class="form-group">
					<textarea id="EditLaporan" name="content" class="form-control" rows="10" disabled="disabled">{{ $report->content }}</textarea>
			  </div>
			  <div class="form-group">
					<input type="submit" name="publish" class="btn btn-metro btn-primary" value="Publish" disabled="disabled">				
			  </div>
			@endif  
		  </form>
		  @endif
		  </div>
	  </div>
	</div>
</div>

<div class="modal fade BuatLaporan" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
			  <h4 class="modal-title">Buat Laporan Hari ini</h4>
		  </div>
		  <div class="modal-body">
		  <form method="POST" action="{{ url('laporan') }}">
		  {{ csrf_field() }}
			  <div class="form-group">
					<textarea id="BuatLaporan" name="content" class="form-control" rows="10"></textarea>
			  </div>
			  <div class="form-group">
				<input type="submit" name="draft" class="btn btn-metro btn-success" value="Save as Draft">
				<input type="submit" name="publish" class="btn btn-metro btn-primary" value="Publish">
			  </div>
		  </form>
		  </div>
	  </div>
	</div>
</div>
<!-- modals -->
@endsection