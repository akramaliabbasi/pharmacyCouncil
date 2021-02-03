@extends('applicantapply.layout')

 

@section('content')

		 

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

  
  <style>
hr.new5 {
  border: 5px solid #e4eaec;
  border-radius: 5px;
}
</style>
<hr class="new5">
	<form action="{{ route('apply.store') }}" method="POST">
		 @csrf
		
    <table class="table table-bordered">
        <tr>
		<td colspan="10">	<select name="application_title" id="application_title" class="form-group">
			<option selected="selected">Select One</option>
			<option value="Renewal Registration Certificate">Renewal Registration Certificate</option>
			<option value="New Registration Form 1">New Registration Form 1</option>
			<option value="New Registration Form 2">New Registration Form 2</option>
			</select>
			&nbsp;<button type="submit" class="btn-secondary">Submit request</button></td>
			
       </tr>
    </table>
	<iframe id="registrationcertificate" src="{{url('renewalregistrationcertificate')}}" width="100%" height="1500" style="border:none;"></iframe>
  </form>
  

    {!! $applicants->links() !!}

      

@endsection