@extends('admin.layout')

 

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
		<form action="{{ route('admin.store') }}" method="POST">
		 @csrf
 
       
    <table class="table table-bordered">

        <tr>
            <td colspan="10">
			<input type="checkbox" id="checkAll"> Check All &nbsp;
			
			<select name="permission" id="permission" class="form-group">
			<option selected="selected">Select One</option>
			<option value="Approval Pending">Approval Pending</option>
			<option value="Verification Pending">Verification Pending</option>
			<option value="Approved">Approved</option>
			<option value="Issued">Issued</option>
			</select>
			&nbsp;
			
			<select name="university" id="university" class="form-group">
			<option selected="selected">Select One</option>
			<option value="mohdakramabbasi@gmail.com">SZABIST</option>
			<option value="mohdakramabbasi@gmail.com">IBA</option>
			<option value="mohdakramabbasi@gmail.com">IQRA</option>
			<option value="mohdakramabbasi@gmail.com">MAJU</option>
			</select>
					&nbsp; <button type="submit" class="btn-secondary">Submit</button>
				</td>
            
            

        </tr>
		<tr>

            <th>&nbsp;</th>
            <th>Photo</th>
            <th>First name</th>
            <th>Last name</th>
            <th>DOB</th>
            <th>Domicile</th>
			<th>permission</th>
			<th width="280px">Degree Status</th>
            <th>Created At</th>
		    <th width="280px">Action </th>

        </tr>

        @foreach ($applicants as $applicant)

        <tr>

            <td><input type="checkbox" id="checkItem" name="checkItem[]" value="{{ $applicant->id }}"> </td>

            <td><a  href="{{ route('admin.show',$applicant->id) }}" ><img src="{{ asset('/images/'.$applicant->profile_image) }}" alt="{{ $applicant->profile_image }}" height="70" width="70" border="0" /></a></td>
            <td>{{ $applicant->first_name }}</td>
            <td>{{ $applicant->last_name }}</td>
            <td>{{ $applicant->date_of_birth }}</td>
            <td>{{ $applicant->domicile }}</td>
            <td>{{ $applicant->permission }}</td>
            <td>Months: {{$findPenality['months']}}<br /> Rs: {{$findPenality['penality']}} </td>
            <td>{{ $applicant->created_at }}</td>

            <td>

               

                   
                    <a class="btn btn-info" href="{{ route('admin.show',$applicant->id) }}">Details</a>
               
            </td>

        </tr>

        @endforeach

    </table>

  </form>

    {!! $applicants->links() !!}

      

@endsection