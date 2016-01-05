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
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<td colspan="7" align=center><b>december 2001</b></td>
			</tr>

			<tr>
				<td colspan="7" align=center><i>another year comes to an end</i></td>
			</tr>

			<tr>
				<td align=center>sun</td>
				<td align=center>mon</td>
				<td align=center>tue</td>
				<td align=center>wed</td>
				<td align=center>thu</td>
				<td align=center>fri</td>
				<td align=center>sat</td>
			</tr>

			<tr>
				<td align=center></td>
				<td align=center></td>
				<td align=center></td>
				<td align=center></td>
				<td align=center></td>
				<td align=center></td>
				<td align=center>1</td>
			</tr>

			<tr>
				<td align=center>2</td>
				<td align=center>3</td>
				<td align=center>4</td>
				<td align=center>5</td>
				<td align=center>6</td>
				<td align=center>7</td>
				<td align=center>8</td>
			</tr>

			<tr>
				<td align=center>9</td>
				<td align=center>10</td>
				<td align=center>11</td>
				<td align=center>12</td>
				<td align=center>13</td>
				<td align=center>14</td>
				<td align=center>15</td>
			</tr>

			<tr>
				<td align=center>16</td>
				<td align=center>17</td>
				<td align=center>18</td>
				<td align=center>19</td>
				<td align=center>20</td>
				<td align=center>21</td>
				<td align=center>22</td>
			</tr>

			<tr>
				<td align=center>23</td>
				<td align=center>24</td>
				<td align=center>25</td>
				<td align=center>26</td>
				<td align=center>27</td>
				<td align=center>28</td>
				<td align=center>29</td>
			</tr>
		</table>
		
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