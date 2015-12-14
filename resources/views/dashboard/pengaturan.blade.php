@extends('layout/template')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-cogs"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li>Pengaturan</li>
				</ul>
				<h4>Pengaturan</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified nav-metro">
			<li class="active"><a href="{{ url('pengaturan') }}"><strong>Ganti password</strong></a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content tab-content-metro mb30 nopadding">
			<div class="tab-pane active" id="home7">
				<form action="pengaturan/{{ Auth::user()->id_karyawan }}/edit" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="col-sm-2 control-label">Password Lama</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="password" name="oldPass">
						</div>
					</div><!-- form-group -->
					<div class="form-group">
						<label class="col-sm-2 control-label">Password Baru</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="password" name="newPass">
						</div>
					</div><!-- form-group -->
					<div class="form-group">
						<label class="col-sm-2 control-label">Konfirm Password</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="password" name="confirmPass">
						</div>
					</div><!-- form-group -->
					<div class="form-group">
						<label class="col-sm-2 control-label">&#160;</label>
						<div class="col-sm-10">
							<input type="submit" value="Save" class="btn btn-success btn-metro">
						</div>
					</div><!-- form-group -->
				</form>  
			</div><!-- tab-pane -->
		</div><!-- tab-content -->
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection