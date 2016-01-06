<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @version $id dev 
  */
use App\Http\Controllers\shift\models\shiftModel as Shift;
use App\Http\Controllers\karyawan\models\KaryawanModel as Employee;
use App\Http\Controllers\laporan\models\laporanModel as Laporan;
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
					<li>Absen</li>
				</ul>
				<h4>Absen Karyawan</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		<div class="panel panel-default">
            <div class="panel-body">
                <form method="POST" action="{{ url('admin/absen') }}" class="form-inline ">
                	{!! csrf_field() !!}
					<div class="form-group form-group-sm">
						<select id="select-basic" data-placeholder="Nama Karyawan" class="width300" name="karyawan" class="form-control" >
							@foreach($karyawan as $employee)
								<option value="{{$employee->id_karyawan}}">{{$employee->nama_karyawan}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group form-group-sm">
						<select id="select-basic" data-placeholder="Shift" class="width300" name="shift" class="form-control">
							@foreach($shifts as $shift)
								<option value="{{$shift->id_shift}}">{{$shift->nama_shift}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group form-group-sm">
						<select id="select-basic" data-placeholder="Tipe" name="tipe" class="width300" >
							<option value="masuk">Masuk</option>
							<option value="keluar">Keluar</option>
						</select>
					</div>
					<button type="submit" class="btn btn-default" name="search">Cari</button>
				</form>
            </div><!-- panel-body -->
        </div><!-- panel -->
		
		<div class="panel panel-default">
			
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Shift</th>
						<th>Tipe</th>
						<th>Tanggal</th>
						<th>Jam</th>
						<th>Poto</th>
					</tr>
				</thead>
				<tbody>
				@foreach($cariAbsen as $value)
					<tr>
						<td>{{ Employee::nama_karyawan($value->id_karyawan) }}</td>
						<td>{{ Shift::nama_shift($value->id_shift) }}</td>
						<td>{{ $value->status }}</td>
						<td>{{ Laporan::tgl_indo($value->created_at) }}</td>
						<?php 
							$jam = explode(" ", $value->created_at);
						?>
						<td>{{ $jam[1] }}</td>
						<td>
							<a href="">
								Photo
							</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection