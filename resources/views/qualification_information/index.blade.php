@extends('qualification_information.layout')

 

@section('content')

 <div class="pull-left">
                 <a class="btn btn-info" href="{{ route('qualification_information.create') }}">Add New</a>
            </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

 

    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>certificate_image</th>
            <th>qualification_level</th>
            <th>year_of_passing</th>
			<th>name_of_institute</th>
            <th>board_university</th>
              <th>Created At</th>

            <th width="280px">Action  </th>

        </tr>

        @foreach ($qualification_information as $qualificationinformation)

        <tr>

            <td>{{ ++$i }}</td>

            <td><a  href="{{ asset('/images/'.$qualificationinformation->certificate_image) }}" ><img src="{{ asset('/images/'.$qualificationinformation->certificate_image) }}" alt="{{ $qualificationinformation->certificate_image }}" height="70" width="70" border="0" /></a></td>
            <td>{{ $qualificationinformation->qualification_level }}</td>
            <td>{{ $qualificationinformation->year_of_passing }}</td>
            <td>{{ $qualificationinformation->name_of_institute }}</td>
            <td>{{ $qualificationinformation->board_university }}</td>
            <td>{{ $qualificationinformation->created_at }}</td>

            <td>

                <form action="{{ route('qualification_information.destroy',$qualificationinformation->id) }}" method="POST">

   

              
                   
                    <a class="btn btn-info" href="{{ route('qualification_information.show',$qualificationinformation->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('qualification_information.edit', $qualificationinformation->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                   <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $qualification_information->links() !!}

      

@endsection