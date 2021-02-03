<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\applicants;
use App\Models\contact_information;
use App\Models\qualification_information;
use App\Models\application_form;

use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		if ($request->session()->get('permission') != 1) {
			//redirect to login 
			Auth::guard('web')->logout();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			return redirect('/login')
			->with('success','Registered successfully! Login Please');
		}

		$applicants = DB::table('application_forms')
            ->join('users', 'application_forms.user_id', '=', 'users.id')
            ->join('applicants', 'application_forms.applicants_id', '=', 'applicants.id')
            ->join('contact_informations', 'application_forms.contact_information_id', '=', 'contact_informations.id')
            ->join('qualification_informations', 'application_forms.qualification_information_id', '=', 'qualification_informations.id')
            ->paginate(10);
     
		$degree_date = $applicants[0]->year_of_passing; //y-m-d
		$findPenality = $this->findPenality($degree_date);
	
	    return view('admin.index',compact('applicants','findPenality'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
	
	
	// Check the degree date submitted late 
	// And add the Penality per month Rs:100
	public function findPenality($degree_date){
		//$degree_date = '2020-10-29'; //y-m-d
		$current_date = Date("Y-m-d");
		
		$ts1 = strtotime($degree_date);
		$ts2 = strtotime($current_date);

		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);

		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);

		$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
		 $find_sum = array();
		 if($diff > 2){
			
			$sum =  $diff-2; //minus -2 month
			$penality =  $sum * 100; // add Rs:100
			$find_sum['months'] = $sum;
			$find_sum['penality'] = $penality;
			return $find_sum;
			 
		 }
	return true;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		         return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function _store(Request $request)
    {
        $request->validate([

            'title' => 'required',
            'first_name' => 'required',
			
        ]);
		
		$allData = $request->all();
		$allData['user_id'] = $request->session()->get('user_id');     
		// ensure the request has a file before we attempt anything else.
        if ($request->hasFile('profile_image')) {

            $request->validate([
                'profile_image' => 'image|mimes:jpeg,png,bmp,jpg,gif,svg|max:1024', // Only allow .jpg, .bmp and .png file types.
            ]);

          // Save the file locally in the storage/public/ folder under a new folder named /product
       // $request->profile_image->store('images', 'public');
		$imageName = time().'.'.$request->profile_image->extension();
		$request->profile_image->move(public_path('images'), $imageName);
		$allData['profile_image'] = $imageName;
		
        }
		
		
		$user = User::find($request->session()->get('user_id'))->toArray();
		$PassData = array();
		$PassData = array_merge($user, $allData);
	    Mail::send('applicantRequest', $PassData, function($message) use ($PassData) {
		
	        $message->to($PassData['email']);
	        $message->subject('Applicant request created successfully.');

	    });

        Applicants::create($allData);
        return redirect()->route('applicants.index')
                        ->with('success','Applicant request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\applicants  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(applicants $applicant)
    {
        return view('admin.show',compact('applicant'));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\applicants  $applicant
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, applicants $applicant)
    {
		
		$request->validate([
            'permission' => 'required'
        ]);
		
		$ids = $request->input('checkItem');
		if(!isset($ids)){  return redirect()->route('admin.index')->with('success','Please check item record ..'); }
        foreach ($ids as $id) {
			
			$applicants = Applicants::find($id); 	 
			$applicants->permission = $request->input('permission');
			$applicants->save();  
		}
		
		$user = User::find($request->session()->get('user_id'))->toArray();
		$PassData = array();
		$PassData = array_merge($user, $applicants);
	    Mail::send('applicantRequest', $PassData, function($message) use ($PassData) {
		
	        $message->to($PassData['email']);
	        $message->subject('Applicant request created successfully.');

	    });
		
		
        return redirect()->route('admin.index')->with('success','Request submitted successfully');
    }

   
}
