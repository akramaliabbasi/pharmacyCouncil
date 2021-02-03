@extends('applicants.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New applicant</h2>
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
   
<form action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row"> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>title:</strong>
				<select name="title">
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
                <input type="text" name="first_name" class="form-control" placeholder="first_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>middle_name:</strong>
                <input type="text" name="middle_name" class="form-control" placeholder="middle_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>last_name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="last_name">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>father_name:</strong>
                <input type="text" name="father_name" class="form-control" placeholder="father_name">
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>occupation:</strong>
                <input type="text" name="occupation" class="form-control" placeholder="occupation">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>marital_status:</strong>
				<select name="marital_status">
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
				<option value="Female">Female</option>
				<option value="Male">Male</option>
				<option value="Other">Other</option>
				</select> 
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>date_of_birth:</strong>
                <input type="text" name="date_of_birth" class="form-control" placeholder="date_of_birth">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>domicile:</strong>
                <input type="text" name="domicile" class="form-control" placeholder="domicile">
            </div>
        </div> 
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country_of_birth:</strong>
                <input type="text" name="country_of_birth" class="form-control" placeholder="country_of_birth">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>religion:</strong>
                 <select name="religion">
				<option value="Muslim">Muslim</option>
				<option value="Non-Muslim">Non-Muslim</option>
				</select>
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>permission:</strong>
                 <select name="permission">
			
				<option value="Approval Pending" selected="selected">Approval Pending</option>
					<!--<option value="Approved">Approved</option>
				<option value="Verification Pending">Verification Pending</option>
				<option value="Issued">Issued</option>-->
				</select>
            </div>
        </div>
	
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>profile_image:</strong>
                <input type="file" name="profile_image" class="form-control" placeholder="profile_image">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>comments:</strong>
				 <textarea class="form-control" style="height:150px" name="comments" placeholder="comments"></textarea>
            </div>
        </div>
       
		
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>

<script type="text/javascript">

    $(document).ready(function() {

      $(".add-btn").click(function(){

          var lsthmtl = $(".clone").html();

          $(".increment").after(lsthmtl);

      });

      $("body").on("click",".btn-danger",function(){

          $(this).parents(".file-div").remove();

      });

    });

</script>

@endsection