<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Extensions\MongoSessionHandler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
		
	
        $request->authenticate();

        $request->session()->regenerate();
		$user =  User::where('email',$request->user()->email)->first();
		
		$request->session()->put('user_id', $user->id);
		$request->session()->put('cnic', $user->cnic);
		$request->session()->put('permission', $user->permission);
		if($user->permission == 0){
			 return redirect()->route('applicants.index');
		}
		
	    //return redirect(RouteServiceProvider::HOME);
		return redirect()->route('admin.index');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
		
		//Added session to unset
		$request->session()->forget('user_id');
		$request->session()->forget('cnic');
		$request->session()->forget('permission');
		$request->session()->flush();

        return redirect('/');
    }
}
