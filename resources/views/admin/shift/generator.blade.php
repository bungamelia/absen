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
				<h4>Shift Generator</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">

	            <form action="{{ url('admin/shift/generator') }}" method="post">
	            {{ csrf_field() }}
	            <div class="row">
	           		<div class="col-sm-3">
		                <div class="form-group">
		                	<label class="control-label" for="id_karyawan">Karyawan</label>
		                    <select name="id_karyawan" id="id_karyawan" style="display:block;">
		                    	@foreach($employees as $employee)
		                    		@if($employee->id_karyawan != '1')
		                    			<option value="{{ $employee->id_karyawan }}">{{ $employee->nama_karyawan }}</option>
		                    		@endif
		                    	@endforeach
		                    </select>
		                </div><!-- form-group -->
	           		</div>
	           		<div class="col-sm-2">
		                <div class="form-group">
		                	<label class="control-label" for="Dari">Dari</label>
		                    <input type="text" name="dari" class="form-control" id="Dari">
		                </div><!-- form-group -->
	           		</div>
	           		<div class="col-sm-2">
		                <div class="form-group">
		                    <label class="control-label" for="Sampai">Sampai</label>
		                    <input type="text" name="sampai" class="form-control" id="Sampai">
		                </div><!-- form-group -->
	           		</div>
	           		<div class="col-sm-3">
		                <div class="form-group">
		                    <label class="control-label" for="Sampai">Shift</label>
		                    <select name="id_shift" id="id_shift" style="display:block;">
		                    	@foreach($shifts as $shift)
		                    		<option value="{{ $shift->id_shift }}">{{ $shift->nama_shift }}</option>
		                    	@endforeach
		                    </select>
		                </div><!-- form-group -->
	           		</div>
	           		<div class="col-sm-2">
	           			<label class="control-label" for="Sampai">&ensp;</label>
	           			<input type="submit" value="Generate" class="btn btn-primary btn-block">
	           		</div>
	            </div>
	                

	                



	           
	                
	            </form>

			<div class="well">
				<?php


$date1 = '01/01/2016';
$date2 = '06/01/2016';

function returnDates($fromdate, $todate) {
    $fromdate = \DateTime::createFromFormat('d/m/Y', $fromdate);
    $todate = \DateTime::createFromFormat('d/m/Y', $todate);
    return new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}

$datePeriod = returnDates($date1, $date2);
foreach($datePeriod as $date) {
    echo $date->format('d/m/Y')."<br/>";
}


				?>
			</div>
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection