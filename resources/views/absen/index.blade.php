<?php
	use App\Http\Controllers\laporan\models\laporanModel;
?>
@extends('layout/template')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-check"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li>Absen</li>
				</ul>
				<h4>Absen</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<div class="panel panel-default">
			<div class="panel-heading" >
			</div><!-- panel-heading -->
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Hari</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Absen</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($absen as $row)
				<?php
					$tgl 		= explode(" ", $row->created_at);
					$timestamp 	= $row->created_at;
					$tahun 		= date('Y',strtotime($timestamp));
					$bulan 		= date('m',strtotime($timestamp));
					$hari 		= date('d',strtotime($timestamp));
					$jam 		= date('H:i:s',strtotime($timestamp));
					$namaFoto	= $row->id_karyawan.'-'.$hari.'-'.$bulan.'-'.$tahun.'.jpeg';
					$poto 		= 'uploads/'.$row->id_karyawan.'/'.$tahun.'/'.$bulan.'/'.$hari.'/'.$namaFoto;
				?>
					<tr>
						<td>{{ laporanModel::getHari($tgl[0]) }}</td>
						<td>{{ laporanModel::tgl_indo($tgl[0]) }}</td>
						<td>{{ $tgl[1] }}</td>
						<td>{{ $row->status }} 
						@if($row->status == 'masuk')
							<a href="#" data-toggle="modal" data-target="#data-{{ $row->id_absen }}"> [ Foto ] </a>
							<!-- Modal -->
							<div class="modal fade" id="data-{{ $row->id_absen }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Foto {{ $row->created_at }}</h4>
							      </div>
							      <div class="modal-body">
							        <img src="{{ url($poto) }}" class="text-center img-responsive img-thumbnail">
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>
						@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		{!! str_replace('/?', '?', $absen->render()) !!}
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection