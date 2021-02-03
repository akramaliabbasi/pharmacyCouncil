@extends('experience_information.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show applicant's Qualification Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('experience_information.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>qualification_level:</strong>
                {{ $experience_information->qualification_level }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>year_of_passing:</strong>
                {{ $experience_information->year_of_passing }}
            </div>
        </div> 
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name_of_institute:</strong>
                {{ $experience_information->name_of_institute }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>board_university:</strong>
                {{ $experience_information->board_university }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>certificate_image:</strong> 
				
				<a  href="{{ asset('/images/'.$experience_information->certificate_image) }}" ><img src="{{ asset('/images/'.$experience_information->certificate_image) }}" alt="{{ $experience_information->certificate_image }}" height="150" width="350" border="0" /></a>    </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $experience_information->created_at }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $experience_information->updated_at }}
            </div>
        </div>
    </div>
@endsection