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
			<li><a href="{{ url('pengaturan') }}"><strong>Home</strong></a></li>
			<li class="active"><a href="{{ url('password') }}"><strong>Password</strong></a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content tab-content-metro mb30 nopadding">
			<div class="tab-pane active>
				<form class="form-horizontal form-bordered">
					<div class="form-group">
						<label class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10">
							<input placeholder="Default Input" class="form-control input-sm" type="text">
						</div>
					</div><!-- form-group -->
					<div class="form-group">
						<label class="col-sm-2 control-label">&#160;</label>
						<div class="col-sm-10">
							<input type="submit" value="save" class="btn btn-success btn-metro">
						</div>
					</div><!-- form-group -->
						
				</form>  
			</div><!-- tab-pane -->
		</div><!-- tab-content -->
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection