<?php

namespace App\Http\Controllers;

use App\Models\contact_information;
use Illuminate\Http\Request;

use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ContactInformationController extends Controller
{
   
   
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request)
    {
		if ($request->session()->get('permission') != 0 || $request->session()->get('permission') == null ) {
			//redirect to login 
			Auth::guard('web')->logout();
			$request->session()->invalidate();
			$request->session()->regenerateToken();
			return redirect('/login')
			->with('success','Registered successfully! Login Please');
		}
		
		
        //$contact_information = contact_information::latest()->paginate(5);
        $contact_information = contact_information::where('user_id',$request->session()->get('user_id'))->paginate(5);

        return view('contact_information.index',compact('contact_information'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('contact_information.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'address' => 'required',
            'city' => 'required',
			
        ]);
		
		$allData = $request->all();
		$allData['user_id'] = $request->session()->get('user_id');    
		
        contact_information::create($allData);
        return redirect()->route('contact_information.index')
                        ->with('success','Record added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact_information  $contact_information
     * @return \Illuminate\Http\Response
     */
    public function show(contact_information $contact_information)
    {
         return view('contact_information.show',compact('contact_information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact_information  $contact_information
     * @return \Illuminate\Http\Response
     */
    public function edit(contact_information $contact_information)
    {
        return view('contact_information.edit',compact('contact_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact_information  $contact_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact_information $contact_information)
    {
            $request->validate([
            'address' => 'required',
            'city' => 'required',
        ]);
		
		$allData = $request->all();
		$allData['user_id'] = $request->session()->get('user_id');    

        $contact_information->update($allData);
        return redirect()->route('contact_information.index')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact_information  $contact_information
     * @return \Illuminate\Http\Response
     */
    public function destroy(contact_information $contact_information)
    {
         $contact_information->delete();
        return redirect()->route('contact_information.index')->with('success','Record deleted successfully');
    }
}
