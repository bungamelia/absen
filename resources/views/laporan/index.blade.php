<?php
	use App\Http\Controllers\laporan\models\laporanModel;
?>
@extends('layout/template')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-tasks"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li>Laporan</li>
				</ul>
				<h4>Laporan</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->

	<div class="contentpanel">
		
		<div class="panel panel-default">
			<div class="panel-heading" >
			</div><!-- panel-heading -->
			<?php
				$input = date('Y-m-d'); 
			?>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Hari</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>State</th>
					</tr>
				</thead>
				<tbody> 
				@foreach ($report as $row) 
				<?php
					$data = explode(" ", $row->updated_at);
				?>
					<tr>
						<td>{{ laporanModel::getHari($data[0]) }}</td>
						<td>{{ laporanModel::tgl_indo($data[0]) }}</td>
						<td>{{ $data[1] }}</td>
						<td>{{ $row->state }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		
		{!! str_replace('/?', '?', $report->render()) !!}
		
	</div><!-- contentpanel -->

</div><!-- mainpanel -->
@endsection