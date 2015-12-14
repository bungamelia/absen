@extends('layout/layout')
@section('content')

<div class="panel panel-signin">
	<div class="panel-body">
		<div class="logo text-center">
			<img src="resources/images/logo-primary.png" alt="Chain Logo" >
		</div>
		<br />
		<div class="mb30"></div>
		
		<form action="{{ url('login') }}" method="POST">
		{{ csrf_field() }}
			<div class="input-group mb15">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control" placeholder="Username" name="username">
			</div><!-- input-group -->
			<div class="input-group mb15">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control" placeholder="Password" name="password">
			</div><!-- input-group -->
			
			<div class="clearfix">
				<div class="pull-left">
					<div class="ckbox ckbox-primary mt10">
						<input type="checkbox" id="rememberMe" value="1">
						<label for="rememberMe">Remember Me</label>
					</div>
				</div>
				<div class="pull-right">
					<button type="submit" class="btn btn-success">Sign In <i class="fa fa-angle-right ml5"></i></button>
					<!--<a href="{{ url('dashboard') }}" class="btn btn-success">Sign In</a>-->
				</div>
			</div>                      
		</form>
		
	</div><!-- panel-body -->
</div><!-- panel -->
@endsection