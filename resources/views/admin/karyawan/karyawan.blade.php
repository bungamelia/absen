<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @version $id dev 
  */
use App\Http\Controllers\karyawan\models\KaryawanModel as Employee;
?>
@extends('layout/admin')
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
					<li>Karyawan</li>
				</ul>
				<h4>Karyawan</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<div class="panel panel-default">
            <div class="panel-body">
                <form method="POST" action="{{ url('admin/karyawan/cari') }}" class="form-inline ">
                	{!! csrf_field() !!}
					<div class="form-group form-group-sm">
						<select id="select-basic" data-placeholder="Divisi" class="width300" name="divisi" class="form-control" >
							<option value="">Divisi</option>
							@foreach($divisi as $dvsi)
								<option value="{{$dvsi->id}}">{{$dvsi->nama_divisi}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group form-group-sm">
						<select id="select-basic" data-placeholder="Jabatan" class="width300" name="jabatan" class="form-control">
							<option value="">Jabatan</option>
							@foreach($jabatan as $jbtan)
								<option value="{{$jbtan->id_jabatan}}">{{$jbtan->nama_jabatan}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-default" name="search">Cari</button>
					<a href="{{ url('admin/karyawan/register') }}" class="btn btn-primary">Tambah Karyawan</a>
				</form>

            </div><!-- panel-body -->
        </div><!-- panel -->
		
		<div class="panel panel-default">
			@if (!isset($_POST['search']))
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Divisi</th>
						<th>Jabatan</th>
						<th>Tempat, tanggal lahir</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				@foreach($karyawan as $value)
					<tr>
						<td>{{ $value->nama_karyawan }}</td>
						<td>{{ Employee::nama_divisi($value->id_divisi) }}</td>
						<td>{{ Employee::nama_jabatan($value->id_jabatan) }}</td>
						<td>{{ $value->ttl }}</td>
						<td>{{ $value->email }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@else
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Divisi</th>
						<th>Jabatan</th>
						<th>Tempat, tanggal lahir</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cariKaryawan as $value)
					<tr>
						<td>{{ $value->nama_karyawan }}</td>
						<td>{{ Employee::nama_divisi($value->id_divisi) }}</td>
						<td>{{ Employee::nama_jabatan($value->id_jabatan) }}</td>
						<td>{{ $value->ttl }}</td>
						<td>{{ $value->email }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			@endif
		</div><!-- panel -->
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection