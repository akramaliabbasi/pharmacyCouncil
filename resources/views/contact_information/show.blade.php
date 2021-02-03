@extends('contact_information.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show applicant's Contact Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contact_information.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>type:</strong>
                {{ $contact_information->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                {{ $contact_information->address }}
            </div>
        </div> 
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>city:</strong>
                {{ $contact_information->city }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country:</strong>
                {{ $contact_information->country }}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>created_at:</strong>
                {{ $contact_information->created_at }}
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>updated_at:</strong>
                {{ $contact_information->updated_at }}
            </div>
        </div>
    </div>
@endsection