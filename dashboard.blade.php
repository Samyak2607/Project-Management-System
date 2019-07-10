@extends('layouts.header')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
        <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol> -->
    </section>

    
    @if(isset($task) && !empty($task))
                          @foreach($task as $tasks)


                          <a href="{{route('task/title',$tasks->title)}}" class="btn btn-link"><h4>{{$tasks->title}}</h4></a><br>
                            
                          @endforeach
                        @else
                           Not any task Alloted Yet
                        
                        @endif
    
</div>

@endsection