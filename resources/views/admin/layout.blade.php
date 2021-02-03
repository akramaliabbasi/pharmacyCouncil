<!DOCTYPE html>
<html>
<head>

    <title>Pharmacy Council::Applicants Personal information</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<script>
	$.noConflict();
	jQuery(document).ready(function(){
		
		jQuery("#checkAll").click(function () { 
		jQuery('input:checkbox').not(this).prop('checked', this.checked);
		});

	});

</script>
  
	

</head>
<body  style="padding: 25px 50px 75px 100px;">


<div class="container">
    <div class="row">
  <!-- Settings Dropdown -->
         
               
    
        <div class="col-lg-12 margin-tb">
		<div class="pull-right"> <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
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
                
				<a  href="#" ><img src="{{ asset('/img/parmacycouncil.jpg') }}" alt="Pharmacy Council" height="100" width="100" border="0" /></a>
				<h2 class="pull-right"> Applicants Personal information</h2> <br/>
			

            </div>

           
        	

        </div>

    </div>  <br/>
    @yield('content')
</div>
  
 <style>
hr.new5 {
  border: 5px solid #e4eaec;
  border-radius: 5px;
}
</style>
<hr class="new5">

</body>
</html>