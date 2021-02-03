@extends('contact_information.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit applicant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contact_information.index') }}"> Back</a>
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
  
    <form action="{{ route('contact_information.update', $contact_information->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
          
                      

		            
       
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address type:</strong>
				<select name="type">
				<option selected value="{{ $contact_information->type }}">{{ $contact_information->type }}</option>	
				<option value ="Permanent">Permanent</option>
				<option value ="Mailing">Mailing</option>
				<option value="Profession">Profession</option>
				</select> 
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <input type="text" name="address" class="form-control" value="{{ $contact_information->address }}" placeholder="address" >
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country:</strong>
                <input type="text" name="country" class="form-control" value="{{ $contact_information->country }}" placeholder="country">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>city:</strong>
                <input type="text" name="city" class="form-control" value="{{ $contact_information->city }}" placeholder="city">
            </div>
        </div>
		
		
			
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
   
    </form>
@endsection