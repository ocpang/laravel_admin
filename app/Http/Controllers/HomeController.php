<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(session('profile_picture') == ""){
            if(Auth::user()->avatar != ""){
                session(['profile_picture' => asset('images/avatars/' . Auth::user()->avatar)]);
            }
            else{
                session(['profile_picture' => asset('images/defaultuser.jpeg')]);                
            }
        }
        
        return view('admin.dashboard');
    }
}
