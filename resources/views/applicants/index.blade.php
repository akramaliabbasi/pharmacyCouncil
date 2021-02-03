@extends('applicants.layout')

 

@section('content')

		<div class="pull-left">
                 <a class="btn btn-info" href="{{ route('applicants.create') }}">Add New</a> 
            </div>   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

 

    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Photo</th>
            <th>first name</th>
            <th>Last_name</th>
            <th>DOB</th>
            <th>Domicile</th>
			<th>permission</th>
			<th width="280px">Degree Status</th>
	        <th>Created At</th>

            <th width="280px">Action </th>

        </tr>

        @foreach ($applicants as $applicant)

        <tr>

            <td>{{ ++$i }}</td>

            <td><a  href="{{ route('applicants.show',$applicant->id) }}" ><img src="{{ asset('/images/'.$applicant->profile_image) }}" alt="{{ $applicant->profile_image }}" height="70" width="70" border="0" /></a></td>
            <td>{{ $applicant->first_name }}</td>
            <td>{{ $applicant->last_name }}</td>
            <td>{{ $applicant->date_of_birth }}</td>
            <td>{{ $applicant->domicile }}</td>
            <td>{{ $applicant->permission }}</td>
			<td>Months: {{$findPenality['months']}}<br /> Rs: {{$findPenality['penality']}} </td>
            <td>{{ $applicant->created_at }}</td>

            <td>

                <form action="{{ route('applicants.destroy',$applicant->id) }}" method="POST">

   

                   
                    <a class="btn btn-info" href="{{ route('applicants.show',$applicant->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('applicants.edit', $applicant->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                  <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $applicants->links() !!}

      

@endsection