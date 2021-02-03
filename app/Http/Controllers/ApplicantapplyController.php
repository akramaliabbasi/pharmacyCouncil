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

class ApplicantapplyController extends Controller
{
   
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, applicants $applicant)
    {
		if ($request->session()->get('permission') != 0 || $request->session()->get('permission') == null ) {
			//redirect to login 
			Auth::guard('web')->logout();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			return redirect('/login')
			->with('success','Registered successfully! Login Please');
		}

        //$applicants = Applicants::latest()->paginate(5);
		$applicants = Applicants::where('user_id',$request->session()->get('user_id'))->paginate(5);

        return view('applicantapply.index',compact('applicants'));
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, applicants $applicant)
    {
       
		
		$request->validate([
            'application_title' => 'required'
        ]);
		$allData = $request->all();
		
		
		$applicants = Applicants::where('user_id',$request->session()->get('user_id'))->get();
		$contact_information = contact_information::where('user_id',$request->session()->get('user_id'))->get();
		$qualification_information = qualification_information::where('user_id',$request->session()->get('user_id'))->get();
		
		$allData['user_id'] = $request->session()->get('user_id');     
		$allData['applicants_id'] = $applicants[0]->id;     
		$allData['contact_information_id'] = $contact_information[0]->id;    
		$allData['qualification_information_id'] = $qualification_information[0]->id;     
		
		
		$user = User::find($request->session()->get('user_id'))->toArray();
		$PassData = array();
		$PassData = array_merge($user, $allData);
	    Mail::send('applicantRequest', $PassData, function($message) use ($PassData) {
		
	        $message->to($PassData['email']);
	        $message->subject('Applicant request created successfully.');

	    });
		
		$applicationtitle = $request->input('application_title');
		if(!isset($applicationtitle)){  return redirect()->route('applicantapply.index')->with('success','Please Select title record ..'); }
       
		application_form::create($allData);
        return redirect()->route('applicantapply.index')->with('success','Request submitted successfully');
    }

    
	
	 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\applicants  $applicant
     * @return \Illuminate\Http\Response
     */
	public function renewalregistrationcertificate(Request $request, applicants $applicant)
	{
		$applicant = DB::table('users')
            ->join('applicants', 'users.id', '=', 'applicants.user_id')
            ->join('contact_informations', 'users.id', '=', 'contact_informations.user_id')
            ->join('qualification_informations', 'users.id', '=', 'qualification_informations.user_id')
            ->select(
			'users.cnic',
			'users.cell',
			'users.email',
			'applicants.first_name',
			'applicants.middle_name',
			'applicants.last_name',
			'applicants.father_name',
			'applicants.occupation',
			'applicants.marital_status',
			'applicants.gender',
			'applicants.date_of_birth',
			'applicants.domicile',
			'applicants.country_of_birth',
			'applicants.occupation',
			'applicants.religion',
			'applicants.profile_image',
			'contact_informations.type',
			'contact_informations.address',
			'contact_informations.country',
			'contact_informations.city',
			'qualification_informations.qualification_level',
			'qualification_informations.year_of_passing',
			'qualification_informations.name_of_institute',
			'qualification_informations.board_university',
			'qualification_informations.certificate_image'
			)
			->where('users.id', '=',$request->session()->get('user_id'))
            ->get();
			
			//	$PassData = array();
		//$PassData = array_merge($user, $allData);
         return view('applicantapply.renewalregistrationcertificate',compact('applicant'));

    }
    
	/**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\applicants  $applicant
     * @return \Illuminate\Http\Response
     */
	public function newregistrationform1(Request $request, applicants $applicant)
	{
		$applicant = DB::table('users')
            ->join('applicants', 'users.id', '=', 'applicants.user_id')
            ->join('contact_informations', 'users.id', '=', 'contact_informations.user_id')
            ->join('qualification_informations', 'users.id', '=', 'qualification_informations.user_id')
            ->select(
			'users.cnic',
			'users.cell',
			'users.email',
			'applicants.first_name',
			'applicants.middle_name',
			'applicants.last_name',
			'applicants.father_name',
			'applicants.occupation',
			'applicants.marital_status',
			'applicants.gender',
			'applicants.date_of_birth',
			'applicants.domicile',
			'applicants.country_of_birth',
			'applicants.occupation',
			'applicants.religion',
			'applicants.profile_image',
			'contact_informations.type',
			'contact_informations.address',
			'contact_informations.country',
			'contact_informations.city',
			'qualification_informations.qualification_level',
			'qualification_informations.year_of_passing',
			'qualification_informations.name_of_institute',
			'qualification_informations.board_university',
			'qualification_informations.certificate_image'
			)
			->where('users.id', '=',$request->session()->get('user_id'))
            ->get();
			
			//	$PassData = array();
		//$PassData = array_merge($user, $allData);
         return view('applicantapply.newregistrationform1',compact('applicant'));

    }
   
   /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\applicants  $applicant
     * @return \Illuminate\Http\Response
     */
	public function newregistrationform2(Request $request, applicants $applicant)
	{
		$applicant = DB::table('users')
            ->join('applicants', 'users.id', '=', 'applicants.user_id')
            ->join('contact_informations', 'users.id', '=', 'contact_informations.user_id')
            ->join('qualification_informations', 'users.id', '=', 'qualification_informations.user_id')
            ->select(
			'users.cnic',
			'users.cell',
			'users.email',
			'applicants.first_name',
			'applicants.middle_name',
			'applicants.last_name',
			'applicants.father_name',
			'applicants.occupation',
			'applicants.marital_status',
			'applicants.gender',
			'applicants.date_of_birth',
			'applicants.domicile',
			'applicants.country_of_birth',
			'applicants.occupation',
			'applicants.religion',
			'applicants.profile_image',
			'contact_informations.type',
			'contact_informations.address',
			'contact_informations.country',
			'contact_informations.city',
			'qualification_informations.qualification_level',
			'qualification_informations.year_of_passing',
			'qualification_informations.name_of_institute',
			'qualification_informations.board_university',
			'qualification_informations.certificate_image'
			)
			->where('users.id', '=',$request->session()->get('user_id'))
            ->get();
			
			//	$PassData = array();
		//$PassData = array_merge($user, $allData);
         return view('applicantapply.newregistrationform2',compact('applicant'));

    }
    
}
