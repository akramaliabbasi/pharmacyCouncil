@extends('contact_information.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Contact Informationt</h2>
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
   
<form action="{{ route('contact_information.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
	 
	 
	 		            

		            
       
	   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address type:</strong>
				<select name="type">
				<option value="Permanent">Permanent</option>
				<option value="Mailing">Mailing</option>
				<option value="Profession">Profession</option>
				</select> 
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>address:</strong>
                <input type="text" name="address" class="form-control" placeholder="address">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>country:</strong>
                <input type="text" name="country" class="form-control" placeholder="country">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>city:</strong>
                <input type="text" name="city" class="form-control" placeholder="city">
            </div>
        </div>
		
		
       
		
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
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