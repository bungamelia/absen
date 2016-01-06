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
				<h4>Daftar Shift 
					<div class="btn-group" role="group" aria-label="...">
					  <a href="{{ url('admin/shift/generator') }}" class="btn btn-sm btn-default">Generate Shift</a>
					</div>
				</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<div class="panel panel-default">
			<div class="panel-heading" >
			</div><!-- panel-heading -->
		</div>
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection