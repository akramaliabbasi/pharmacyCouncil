@extends('applicants.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit applicant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applicants.index') }}"> Back</a>
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
  
    <form action="{{ route('applicants.update', $applicant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
          
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
				<select name="title">
				<option selected value="{{ $applicant->title }}">{{ $applicant->title }}</option>
				<option value ="Mr.">Mr.</option>
				<option value ="Mrs.">Mrs.</option>
				<option value ="Miss">Miss</option>
				<option value ="Ms.">Ms.</option>
				<option value ="Dr.">Dr.</option>
				</select> 
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first_name:</strong>
                <input type="text" name="first_name" class="form-control" value="{{ $applicant->first_name }}" placeholder="first_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>middle_name:</strong>
                <input type="text" name="middle_name" class="form-control" value="{{ $applicant->middle_name }}" placeholder="middle_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last_name:</strong>
                <input type="text" name="last_name" class="form-control" value="{{ $applicant->last_name }}" placeholder="last_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>father_name:</strong>
                <input type="text" name="father_name" class="form-control" value="{{ $applicant->father_name }}"  placeholder="father_name">
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>occupation:</strong>
                <input type="text" name="occupation" class="form-control"  value="{{ $applicant->occupation }}" placeholder="occupation">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>marital_status:</strong>
				<select name="marital_status">
				<option selected value="{{ $applicant->marital_status }}">{{ $applicant->marital_status }}</option>
				<option value ="Married">Married</option>
				<option value ="Single">Single</option>
				<option value ="Separated/Divorced">Separated/Divorced</option>
				<option value ="Widowed">Widowed</option>
				</select> 
             </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gender:</strong>
                <select name="gender">
				<option selected value="{{ $applicant->gender }}">{{ $applicant->gender }}</option>
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">Other/option>
				</select> 
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date_of_birth:</strong>
                <input type="text" name="date_of_birth" class="form-control" value="{{ $applicant->date_of_birth }}" placeholder="date_of_birth">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>domicile:</strong>
                <input type="text" name="domicile" class="form-control" value="{{ $applicant->domicile }}" placeholder="domicile">
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country_of_birth:</strong>
                <input type="text" name="country_of_birth" class="form-control" value="{{ $applicant->country_of_birth }}" placeholder="country_of_birth">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>religion:</strong>
                 <select name="religion">
				<option selected value="{{ $applicant->religion }}">{{ $applicant->religion }}</option>
				<option value="Muslim">Muslim</option>
				<option value="Non-Muslim">Non-Muslim</option>
				</select>
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>permission:</strong>
                 <select name="permission">
				<option selected value="{{ $applicant->permission }}">{{ $applicant->permission }}</option>	 
				<option value="Approved">Approved</option>
				<option value="Approval Pending">Approval Pending</option>
				<option value="Verification Pending">Verification Pending</option>
				<option value="Issued">Issued</option>
				</select>
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>profile_image:</strong> <img src="{{ asset('/images/'.$applicant->profile_image) }}" alt="{{ $applicant->profile_image }}" height="70" width="70" border="0" />
			  <input type="file" name="profile_image" class="form-control" placeholder="profile_image" value="{{ $applicant->profile_image }}">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>comments:</strong>
				 <textarea class="form-control" style="height:150px" name="comments" placeholder="comments">{{ $applicant->comments }}</textarea>
            </div>
        </div>
			
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection