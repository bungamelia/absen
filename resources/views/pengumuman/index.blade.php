<?php
	use App\Http\Controllers\laporan\models\laporanModel;
?>
@extends('layout/template')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-bookmark"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li>Pengumuman</li>
				</ul>
				<h4>Pengumuman</h4>
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
						<th>Title</th>
						<th>Tanggal</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($notice as $row)
					<tr>
						<td>{{ $row->isi }}</td>
						<td>{{ laporanModel::tgl_indo($row->tanggal) }}</td>
						<td>Urgen</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		
		{!! str_replace('/?', '?', $notice->render()) !!}
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection