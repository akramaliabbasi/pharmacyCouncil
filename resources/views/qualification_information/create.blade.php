@extends('qualification_information.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Qualification Informationt</h2>
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
   
<form action="{{ route('qualification_information.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
	 
	 
	  
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>qualification_level:</strong>
                <input type="text" name="qualification_level" class="form-control" placeholder="qualification_level">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>year_of_passing:</strong>
                <input type="text" name="year_of_passing" class="form-control" placeholder="year_of_passing">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name_of_institute:</strong>
                <input type="text" name="name_of_institute" class="form-control" placeholder="name_of_institute">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>board_university:</strong>
                <input type="text" name="board_university" class="form-control" placeholder="board_university">
            </div>
        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>certificate_image:</strong>
                <input type="file" name="certificate_image" class="form-control" placeholder="certificate_image">
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