@extends('contact_information.layout')

 

@section('content')

	<div class="pull-left">
                 <a class="btn btn-info" href="{{ route('contact_information.create') }}">Add New</a>
            </div>


   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>type</th>
            <th>address</th>
			<th>city</th>
            <th>country</th>
            <th>Created At</th>

            <th width="280px">Action </th>

        </tr>

        @foreach ($contact_information as $contactinformation)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $contactinformation->type }}</td>
            <td>{{ $contactinformation->address }}</td>
            <td>{{ $contactinformation->city }}</td>
            <td>{{ $contactinformation->country }}</td>
            <td>{{ $contactinformation->created_at }}</td>

            <td>

                <form action="{{ route('contact_information.destroy',$contactinformation->id) }}" method="POST">

   

                   
                    <a class="btn btn-info" href="{{ route('contact_information.show',$contactinformation->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('contact_information.edit', $contactinformation->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

               <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $contact_information->links() !!}

      

@endsection