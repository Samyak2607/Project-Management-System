@extends('layouts.header')

@section('content')
        <!-- Right side column. Contains the navbar and content of the page -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile

          </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"><b>{{ Auth::user()->designation }}</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <br>
                <b>Username</b><pre> {{ Auth::user()->username }} </pre>
                <br>
                <b>Email Id</b><pre> {{ Auth::user()->email }} </pre>
                <br>
                <b>Contact Number</b><pre> {{ Auth::user()->contact }}</pre> @if(Auth::user()->designation!='Admin')
                <b>Department</b><pre>{{Auth::user()->department}}</pre> @endif
                <div class="box-footer clearfix no-border">
                    
                    
                        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> <a href="{{route('admin/edit',Auth::user()->username)}}">Edit</a> </button><br><br>
                   
                        <small class="pull-right">Update Your Profile</small>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
        <!-- /.content-wrapper -->



