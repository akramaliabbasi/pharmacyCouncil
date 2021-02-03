<?php

namespace App\Http\Controllers;

use App\Models\qualification_information;
use Illuminate\Http\Request;

use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class QualificationInformationController extends Controller
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
		
		
        //$qualification_information = qualification_information::latest()->paginate(5);
        $qualification_information = qualification_information::where('user_id',$request->session()->get('user_id'))->paginate(5);

        return view('qualification_information.index',compact('qualification_information'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('qualification_information.create');
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

            'qualification_level' => 'required',
            'year_of_passing' => 'required',
			
        ]);
		
		$allData = $request->all();
		$allData['user_id'] = $request->session()->get('user_id');    
		     
		// ensure the request has a file before we attempt anything else.
        if ($request->hasFile('certificate_image')) {

            $request->validate([
                'certificate_image' => 'image|mimes:jpeg,png,bmp,jpg,gif,svg|max:1500', // Only allow .jpg, .bmp and .png file types.
            ]);

          // Save the file locally in the storage/public/ folder under a new folder named /product
       // $request->certificate_image->store('images', 'public');
		$imageName = time().'.'.$request->certificate_image->extension();
		$request->certificate_image->move(public_path('images'), $imageName);
		$allData['certificate_image'] = $imageName;
        }
    
    

        qualification_information::create($allData);
        return redirect()->route('qualification_information.index')
                        ->with('success','Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\qualification_information  $qualification_information
     * @return \Illuminate\Http\Response
     */
    public function show(qualification_information $qualification_information)
    {
        return view('qualification_information.show',compact('qualification_information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\qualification_information  $qualification_information
     * @return \Illuminate\Http\Response
     */
    public function edit(qualification_information $qualification_information)
    {
        return view('qualification_information.edit',compact('qualification_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\qualification_information  $qualification_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qualification_information $qualification_information)
    {
            $request->validate([
            'qualification_level' => 'required',
            'year_of_passing' => 'required',
        ]);
		
		$allData = $request->all();
		$allData['user_id'] = $request->session()->get('user_id');    
		     
		// ensure the request has a file before we attempt anything else.
        if ($request->hasFile('certificate_image')) {

            $request->validate([
                'certificate_image' => 'image|mimes:jpeg,png,bmp,jpg,gif,svg|max:1500', // Only allow .jpg, .bmp and .png file types.
            ]);

          // Save the file locally in the storage/public/ folder under a new folder named /product
       // $request->certificate_image->store('images', 'public');
		$imageName = time().'.'.$request->certificate_image->extension();
		$request->certificate_image->move(public_path('images'), $imageName);
		$allData['certificate_image'] = $imageName;
        }
    

        $qualification_information->update($allData);
	    return redirect()->route('qualification_information.index')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\qualification_information  $qualification_information
     * @return \Illuminate\Http\Response
     */
    public function destroy(qualification_information $qualification_information)
    {
       
        $qualification_information->delete();
        return redirect()->route('qualification_information.index')->with('success','Record deleted successfully');
    }
}
