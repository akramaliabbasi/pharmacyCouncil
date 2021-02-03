<?php

namespace App\Http\Controllers;

use App\Models\experience_information;
use Illuminate\Http\Request;

use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ExperienceController extends Controller
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
		
		
        //$experience_information = experience_information::latest()->paginate(5);
        $experience_information = experience_information::where('user_id',$request->session()->get('user_id'))->paginate(5);

        return view('experience_information.index',compact('experience_information'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('experience_information.create');
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
    
    

        experience_information::create($allData);
        return redirect()->route('experience_information.index')
                        ->with('success','Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experience_information  $experience_information
     * @return \Illuminate\Http\Response
     */
    public function show(experience_information $experience_information)
    {
        return view('experience_information.show',compact('experience_information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experience_information  $experience_information
     * @return \Illuminate\Http\Response
     */
    public function edit(experience_information $experience_information)
    {
        return view('experience_information.edit',compact('experience_information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experience_information  $experience_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience_information $experience_information)
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
    

        $experience_information->update($allData);
	    return redirect()->route('experience_information.index')->with('success','Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience_information  $experience_information
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience_information $experience_information)
    {
       
        $experience_information->delete();
        return redirect()->route('experience_information.index')->with('success','Record deleted successfully');
    }
}
