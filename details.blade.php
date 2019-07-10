@extends('layouts.header')

@section('content')

<!-- <div class="flash-message col-md-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
     @if (Session::has($msg))
     <div class="alert alert-{{ $msg }} alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get($msg) }}
    </div>
     
      @endif
  @endforeach
</div> -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Project Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('manager/taskmanage',$project_details->title)}}">
                        @csrf
                       
                    <h2>{{$project_details->title}}</h2><br>

                    <h3>Company:</h3> {{$project_details->company_name}}<br><br>

                    <h3>Details:</h3>
                            {{ $project_details->details }}<br><br>

                            <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tasking') }}
                                </button>

                                
                                    <a class="btn btn-link" href="{{ url()->previous() }}">
                                        {{ __('Cancel') }}
                                    </a>
                                
                            </div>
                        </div>


                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Project Details

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
                <h3 class="box-title"><b>{{Auth::user()->designation }}</b></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <br>
                <b>Title</b><pre> {{ $project_details->title }} </pre>
                <br>
                <b>Company</b><pre> {{ $project_details->company_name }} </pre>
                <br>
              <div class="box box-solid bg-light-blue">
                <div class="box-header">
                  <h3 class="box-title">Details</h3>
                </div>
                <div class="box-body">
                  @if(empty($project_details->details))

                  <p>
                      Sorry, Project Details Not Mentioned By Admin.
                  </p>

                  @else
                  <p>
                    {{ $project_details->details }}
                  </p>
                  @endif
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div> @if(Auth::user()->designation!='Admin')
                <div class="box-footer clearfix no-border">
                        <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> <a href="{{route('manager/taskmanage',$project_details->title)}}">Assign Task</a> </button><br><br>
                        <small class="pull-right">Add Tasking</small>
                </div> @endif
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

@endsection
