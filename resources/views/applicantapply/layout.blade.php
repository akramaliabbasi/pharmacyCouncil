<!DOCTYPE html>
<html>
<head>
    <title>Pharmacy Council::Request for application (RFA)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<script>
	$.noConflict();
	jQuery(document).ready(function(){
      // bind change event to select
      jQuery('#application_title').on('change', function () {
          var val = jQuery(this).val(); // get selected value
	      if (val == "Renewal Registration Certificate") { 
              jQuery("#registrationcertificate").attr("src", "{{url('renewalregistrationcertificate')}}");
          }
		  if (val == "New Registration Form 1") {
              jQuery("#registrationcertificate").attr("src", "{{url('newregistrationform1')}}");
          }
		  if (val == "New Registration Form 2") { 
              jQuery("#registrationcertificate").attr("src", "{{url('newregistrationform2')}}");
          } 
          return false;
      });
	});
</script>
</head>
<body>
<div class="container">
    <div class="row">
  <!-- Settings Dropdown -->
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
				<h2 class="pull-right"> Request for application (RFA)</h2> <br/>
		    </div>
			<div class="pull-right">
			<a class="btn btn-secondary" href="{{ route('applicants.index') }}">  Personal Information</a>
                <a class="btn btn-secondary" href="{{ route('contact_information.index') }}">  Contact Information</a>
                <a class="btn btn-secondary" href="{{ route('qualification_information.index') }}">  Qualification information</a>
				<a class="btn btn-success" href="{{ route('apply.index') }}"> Apply </a>
		</div>
        </div>
   </div>  <br/>
    @yield('content')
</div>
</body>
</html>