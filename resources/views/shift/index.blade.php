<?php
	use App\Http\Controllers\laporan\models\laporanModel;
?>
@extends('layout/template')
@section('content')

<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-calendar-o"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li>Jadwal Shift</li>
				</ul>
				<h4>Jadwal Shift</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		<div class="row">
            <div class="col-sm-4">               
                <div class="btn-list">  
                 	<a href="#" class="btn btn-primary btn-metro" data-toggle="modal" data-target=".Request">
						Request
					</a>
                </div>                   
            </div><!-- col-sm-4 -->
        </div>
		<?php
$month 	= date('m');
$year 	= date('Y');
// Draw table for Calendar 
	$calendar = '
<table class="table table-striped table-bordered table-condensed calendar">';

	// Draw Calendar table headings 
	$headings = array('Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu');
	$calendar.= '
<tr class="calendar-row">
<td class="calendar-day-head">'.implode('</td>
<td class="calendar-day-head">',$headings).'</td>
</tr>
';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '
<tr class="calendar-row">';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '
<td class="calendar-day-np"> </td>
';
		$days_in_this_week++;
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '
<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{
				$showtoday='<strong class="overday">'.$list_day.'</strong>';
			}else
			{
				$showtoday=$list_day;
			}
			$calendar.= '
<div class="day-number">'.$showtoday.'</div>
';

		// Draw table end
		$calendar.= '</td>
';
		if($running_day == 6):
			$calendar.= '</tr>
';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '
<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	// Finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '
<td class="calendar-day-np"> </td>
';
		endfor;
	endif;

	// Draw table final row
	$calendar.= '</tr>
';

	// Draw table end the table 
	$calendar.= '</table>
';
	
	// Finally all done, return result 
	echo $calendar;

		?>
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection

@section('modals')
<div class="modal fade Request" tabindex="-1" role="dialog" data-backdrop="static">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		  <div class="modal-header">
			  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
			  <h4 class="modal-title">Request Ganti Jadwal Shift</h4>
		  </div>
		  <div class="modal-body">
			<div class="row">
				<div class="col-sm-6">
					 <form method="POST" action="{{ url('request') }} ">
					 	{{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shift Lama</label>
                            <div class="col-sm-9">
                                <select name="shiftLama" class="form-control" required>
                                	<option value="">Pilih</option>
                                @foreach ($shiftLine as $rows)
                                    <option value="{{ $rows->nama_shift }} - {{ $rows->tanggal_shift }}">{{ laporanModel::tgl_indo($rows->tanggal_shift) }} - {{ $rows->nama_shift }}</option>
                                @endforeach 
                                </select>
                            </div>
                        </div><!-- form-group -->
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pilih Shift</label>
                            <div class="col-sm-9">
                               <select name="shift" class="form-control" required>
                                	<option value="">Shift ke-</option>
                                @foreach ($shift as $row)
                                    <option value="{{ $row->nama_shift }}">{{ $row->nama_shift }}</option>
                                @endforeach   
                                </select>
                            </div>
                        </div><!-- form-group -->

                        <div class="form-group">
                        	<label class="col-sm-3 control-label">Tanggal</label>
                        	<div class="col-sm-9">
                            	<input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker" name="tanggal">
                            </div>
                        </div><!-- input-group -->

                        <div class="form-group">
                        	<label class="col-sm-3 control-label">Alasan</label>
                        	<div class="col-sm-9">
								<textarea name="alasan" rows="3" class="form-control"></textarea>
							</div>
						</div>
                            
                        <div class="form-group">
							<button type="submit" class="btn btn-primary mr5">Submit</button>
		                    <button type="reset" class="btn btn-dark">Reset</button>
					    </div>
                    </form>
				</div>
				<div class="col-sm-6">
				@if($req != null)
					<table class="table table-striped table-bordered table-condensed">
						<?php
							$data = explode(" - ", $req->shift_lama);
							$datas = explode(" - ", $req->shift_baru);
						?>
						<tr>
							<td>Shift Lama</td>
							<td>{{ $data[0] }} - {{ laporanModel::tgl_indo($data[1]) }}</td>
						</tr>
						<tr>
							<td>Shift Baru</td>
							<td>{{ $datas[0] }} - {{ laporanModel::tgl_indo($datas[1]) }}</td>
						</tr>
						<tr>
							<td>Alasan</td>
							<td>{{ $req->alasan }}</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>{{ $req->status }}</td>
						</tr>
					</table>
				@endif	
				</div>
			</div>
		  </div>		  
	  </div>
	</div>
</div>
@endsection