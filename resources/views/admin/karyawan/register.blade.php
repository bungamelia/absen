@extends('layout/admin')
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
				<form id="basicForm" action="{{ url('admin/karyawan/register') }}" method="POST">
				{!! csrf_field() !!}
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-btns">
							<a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
							<a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
						</div><!-- panel-btns -->
						<h4 class="panel-title">Tambah Karyawan</h4>
					</div><!-- panel-heading -->
					<div class="panel-body">
						<div class="row">
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Lengkap</label>
								<div class="col-sm-9">
									<input type="text" name="name" class="form-control" required />
								</div>
							</div><!-- form-group -->
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Jenis Kelamin</label>
								<div class="col-sm-9">
									<select id="select-search-hide" data-placeholder="Pilih" class="width100p" name="jkelamin" required> 
										<option value="">Pilih</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div><!-- form-group -->

							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9">
									<textarea name="alamat" class="form-control" rows="3"></textarea>
								</div>
							</div><!-- form-group -->

							<div class="form-group">
								<label class="col-sm-3 control-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<input type="text" name="tempat" class="form-control" required />
								</div>
							</div><!-- form-group -->

							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-9">
									<input type="text" name="tanggal" class="form-control" id="datepicker" required />
								</div>
							</div><!-- form-group -->

							
						</div><!-- row -->
					</div><!-- panel-body -->
					
				</div><!-- panel -->
			</div><!-- col-md-6 -->

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" required />
								</div>
							</div><!-- form-group -->
						  
							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input type="email" name="email" class="form-control" required />
								</div>
							</div><!-- form-group -->
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" required />
								</div>
							</div><!-- form-group -->
							

							<div class="form-group">
								<label class="col-sm-3 control-label">Divisi</label>
								<div class="col-sm-9">
									<select id="select-search-hide" data-placeholder="Pilih" class="width100p" name="divisi" required> 
										<option value="">Pilih</option>
										@foreach($divisi as $dvsi)
											<option value="{{$dvsi->id}}">{{$dvsi->nama_divisi}}</option>
										@endforeach
									</select>
								</div>
							</div><!-- form-group -->

							<div class="form-group">
								<label class="col-sm-3 control-label">Jabatan</label>
								<div class="col-sm-9">
									<select id="select-search-hide" data-placeholder="Pilih" class="width100p" name="jabatan" required> 
										<option value="">Pilih</option>
										@foreach($jabatan as $jbtan)
											<option value="{{$jbtan->id_jabatan}}">{{$jbtan->nama_jabatan}}</option>
										@endforeach
									</select>
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