@extends('layout/template')
@section('content')
<div class="mainpanel">
	<div class="pageheader">
		<div class="media">
			<div class="pageicon pull-left">
				<i class="fa fa-user"></i>
			</div>
			<div class="media-body">
				<ul class="breadcrumb">
					<li><a href=""><i class="glyphicon glyphicon-home"></i></a></li>
					<li><a href="">Pages</a></li>
					<li>Profile Page</li>
				</ul>
				<h4>Profile Page</h4>
			</div>
		</div><!-- media -->
	</div><!-- pageheader -->

	<div class="contentpanel">
		
		<div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="text-center">
                    <img src="resources/images/photos/profile-big.jpg" class="img-circle img-offline img-responsive img-profile" alt="" />
                    <h4 class="profile-name mb5"> {{ $data->username }} </h4>
                    <div><i class="fa fa-map-marker"></i> San Francisco, California, USA</div>
                    <div><i class="fa fa-briefcase"></i> Software Engineer at <a href="">Company, Inc.</a></div>
                
                    <div class="mb20"></div>
                </div><!-- text-center -->
                
                <br />
            </div><!-- col-sm-4 col-md-3 -->
                            
            <div class="col-sm-8 col-md-9">
                <div class="col-md-8">
                    <?php 
                        $id = Auth::user()->id_karyawan;
                    ?>
                    <form class="form-horizontal" method="POST" action="<?php echo "profile/".$id."/edit"; ?>">
                    {{ csrf_field() }}
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-btns">
                                    <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                                </div><!-- panel-btns -->
                                <h4 class="panel-title">Profile</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nama" class="form-control" value="{{ $data->nama_karyawan }}" />
                                    </div>
                                </div><!-- form-group -->
                            
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" value="{{ $data->email }}" />
                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" name="alamat"> {{ $data->alamat }} </textarea>
                                    </div>
                                </div><!-- form-group -->

                                <?php
                                    $ttl = explode (',', $data->ttl);
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tempat" class="form-control" value="{{ $ttl[0] }}" />
                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="tanggal" class="form-control" id="datepicker" value="{{ $ttl[1] }}" />
                                    </div>
                                </div><!-- form-group -->

                            </div><!-- panel-body -->
                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary mr5">Submit</button>
                            </div><!-- panel-footer -->
                        </div><!-- panel-default -->
                    </form>
                </div><!-- col-md-6 -->                                   
            </div><!-- col-sm-9 -->
        </div><!-- row -->  
		
	</div><!-- contentpanel -->

	</div><!-- mainpanel -->
@endsection

@section('script')

	<script src="resources/js/jquery.prettyPhoto.js"></script>
    <script src="resources/js/holder.js"></script>
	
	<script>
        jQuery(document).ready(function(){
          jQuery("a[data-rel^='prettyPhoto']").prettyPhoto();
        });
    </script>
@endsection