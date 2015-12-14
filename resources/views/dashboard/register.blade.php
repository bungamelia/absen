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
					<li>Register</li>
				</ul>
				<h4>Register</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->
	
	<div class="contentpanel">
		
		<div class="row">
			<div class="col-md-6">
				<form id="basicForm" action="{{ url('register') }}" method="POST">
				{!! csrf_field() !!}
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
							<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
						</div><!-- panel-btns -->
						<h4 class="panel-title">Basic Form Validation</h4>
						<p>Please provide your name, email address (won't be published) and a comment.</p>
					</div><!-- panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="form-group">
								<label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
								<div class="col-sm-9">
									<input type="text" name="name" class="form-control" required />
								</div>
							</div><!-- form-group -->
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" required />
								</div>
							</div><!-- form-group -->
						  
							<div class="form-group">
								<label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
								<div class="col-sm-9">
									<input type="email" name="email" class="form-control" required />
								</div>
							</div><!-- form-group -->
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" required />
								</div>
							</div><!-- form-group -->
							
						</div><!-- row -->
					</div><!-- panel-body -->
					<div class="panel-footer">
					  <div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<button class="btn btn-primary mr5">Submit</button>
							<button type="reset" class="btn btn-dark">Reset</button>
						</div>
					  </div>
					</div><!-- panel-footer -->  
				</div><!-- panel -->
				</form>
			</div><!-- col-md-6 -->
		</div>
		
	</div><!-- contentpanel -->
	
</div><!-- mainpanel -->
@endsection