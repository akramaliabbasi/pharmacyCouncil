<!DOCTYPE html>
<html>
<head>

    <title>Pharmacy Council::Qualification information</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
  

<div class="container">

  <div class="row">

        <div class="col-lg-12 margin-tb">
		<div class="pull-right"> Welcome : {{ Auth::user()->cnic }}
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
            </div>

            <div class="pull-left">

                
				<a  href="#" ><img src="{{ asset('/img/parmacycouncil.jpg') }}" alt="Pharmacy Council" height="170" width="170" border="0" /></a>
				<h2 class="pull-right"> Applicant's Qualification information</h2> <br/>
			

            </div>

            <div class="pull-right">
                 <a class="btn btn-secondary" href="{{ route('applicants.index') }}">  Personal Information</a>
                <a class="btn btn-secondary" href="{{ route('contact_information.index') }}">  Contact Information</a>
                <a class="btn btn-secondary" href="{{ route('qualification_information.index') }}">  Qualification information</a>
				 <a class="btn btn-success" href="{{ route('experience_information.index') }}">  Experience information</a>
				<a class="btn btn-secondary" href="{{ route('apply.index') }}"> Apply </a>
				
            </div>
			

        </div>

    </div>  <br/>
	
    @yield('content')
</div>
  

</body>
</html>