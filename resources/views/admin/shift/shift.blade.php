<?php
/**
  * @author  Bunga A. Restuputri <bungamelia@hotmail.com>
  * @version $id dev 
  */
use App\Http\Controllers\karyawan\models\KaryawanModel as Employee;
use App\Http\Controllers\shift\models\shiftModel as Shift;
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
					<li>Shift</li>
				</ul>
				<h4>Daftar Shift</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <h4 class="panel-title">Shift Generator</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/shift/generator') }}" method="post">
                	{{ csrf_field() }}
                	<div class="row">
                        <div class="form-group col-md-3">
                            <select name="id_karyawan" id="id_karyawan" style="display:block;">
								<option value="">Karyawan</option>
								@foreach($employees as $employee)
			                		@if($employee->id_karyawan != '1')
			                			<option value="{{ $employee->id_karyawan }}">{{ $employee->nama_karyawan }}</option>
			                		@endif
			                	@endforeach
						</select>
                        </div>

                        <div class="form-group col-md-2">
                            <input type="text" name="dari" class="form-control" id="Dari" placeholder="Dari">
                        </div>

                        <div class="form-group col-md-2">
                           <input type="text" name="sampai" class="form-control" id="Sampai" placeholder="Sampai">
                        </div>

                        <div class="form-group col-md-3">
                            <select name="id_shift" id="id_shift" style="display:block;">
		                	@foreach($shifts as $row)
		                		<option value="{{ $row->id_shift }}">{{ $row->nama_shift }}</option>
		                	@endforeach
		                	</select>
                        </div>

                        <div class="form-group col-md-2">
                            <button type="submit" class="btn btn-primary mr5">Generate</button>
                        </div>
                    </div><!-- row -->
                </form>
            </div><!-- panel-body -->
        </div><!-- panel -->

        <div class="panel panel-default">
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Nama Karyawan</th>
						<th>Shift ke-</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
				@foreach($shift as $value)
					<tr>
						<td>{{ Employee::nama_karyawan($value->id_karyawan) }}</td>
						<td>{{ Shift::nama_shift($value->id_shift) }}</td>
						<td>{{ $value->tanggal_shift }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div><!-- panel -->
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection