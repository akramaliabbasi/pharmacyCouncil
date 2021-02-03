@extends('qualification_information.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Qualification Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('qualification_information.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('qualification_information.update', $qualification_information->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
          
              	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>qualification_level:</strong>
                <input type="text" name="qualification_level" class="form-control" value="{{ $qualification_information->qualification_level }}" placeholder="qualification_level">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>year_of_passing:</strong>
                <input type="text" name="year_of_passing" class="form-control" value="{{ $qualification_information->year_of_passing }}" placeholder="year_of_passing">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name_of_institute:</strong>
                <input type="text" name="name_of_institute" class="form-control" value="{{ $qualification_information->name_of_institute }}" placeholder="name_of_institute">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>board_university:</strong>
                <input type="text" name="board_university" class="form-control" value="{{ $qualification_information->board_university }}" placeholder="board_university">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                   <strong>certificate_image:</strong> <img src="{{ asset('/images/'.$qualification_information->certificate_image) }}" alt="{{ $qualification_information->certificate_image }}" height="70" width="70" border="0" />
			    <input type="file" name="certificate_image" class="form-control" value="{{ $qualification_information->certificate_image }}" placeholder="certificate_image">
            </div>
        </div>
		
		
		
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection