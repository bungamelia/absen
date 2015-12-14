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
					$tgl = explode(" ", $row->created_at);
				?>
					<tr>
						<td>{{ laporanModel::getHari($tgl[0]) }}</td>
						<td>{{ laporanModel::tgl_indo($tgl[0]) }}</td>
						<td>{{ $tgl[1] }}</td>
						<td>{{ $row->status }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		{!! str_replace('/?', '?', $absen->render()) !!}
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection