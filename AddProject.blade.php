@extends('layouts.Adminlayout')

@section('content')

<div class="flash-message col-md-12">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
     @if (Session::has($msg))
     <div class="alert alert-{{ $msg }} alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get($msg) }}
    </div>
     
      @endif
  @endforeach
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Project') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin/create-project') }}" enctype="multipart/form-data">
                        @csrf
                       

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="username" autofocus>

                                @error('Username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="company_name" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('Company Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Details') }}</label><br>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('Details') is-invalid @enderror" name="details" required autocomplete="">
                            </div>
                        </div>


                        <!-- <div class="form-group row">
                            <label for="tag" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                <input id="tags" type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" placeholder="Tags" class="typeahead tm-input form-control tm-input-info">

                                @error('Tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <a class="btn btn-link" href="{{ route('admin/add-tag') }}">{{ __('Add tags') }}

                                </a>
                        </div>
 -->
                        <div class="form-group row">
                            <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __('Tags') }}</label>

                            <div class="col-md-6">
                                    

                                    

                                    <select name ="tag" class="js-example-placeholder-multiple js-states form-control" multiple="multiple">
                                    @foreach($tags as $d)
                                        
                                        <option>{{$d->skills}}</option>
                                        
                                    @endforeach
                                    </select>

                                    
                            </div>
                            <a class="btn btn-link" href="{{ route('admin/add-tag') }}">
                                        {{ __('Add Tag') }}
                                    </a>
                        </div>
                         

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('admin-dashboard') }}">{{ __('Cancel') }}

                                </a> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
