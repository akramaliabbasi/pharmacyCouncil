@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show applicant</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('applicants.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
  	 
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
				{{ $applicant->title }}
			</div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>first_name:</strong>
                {{ $applicant->first_name }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>middle_name:</strong>
              {{ $applicant->middle_name }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last_name:</strong>
               {{ $applicant->last_name }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>father_name:</strong>
             {{ $applicant->father_name }}
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>occupation:</strong>
              {{ $applicant->occupation }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>marital_status:</strong>
				{{ $applicant->marital_status }}
             </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>gender:</strong>
             {{ $applicant->gender }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date_of_birth:</strong>
             {{ $applicant->date_of_birth }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>domicile:</strong>
            {{ $applicant->domicile }}
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country_of_birth:</strong>
              {{ $applicant->country_of_birth }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>religion:</strong>
                {{ $applicant->religion }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
			 <strong>permission:</strong>
               {{ $applicant->permission }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>profile_image:</strong> <img src="{{ asset('/images/'.$applicant->profile_image) }}" alt="{{ $applicant->profile_image }}" height="70" width="70" border="0" />
		
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>comments:</strong>
				 {{ $applicant->comments }}
            </div>
        </div>
		
    </div>
@endsection