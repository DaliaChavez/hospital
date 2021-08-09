<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class homeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    
    public function home(){
        if (Auth::check() && Auth::user()->status == 1 ) {
            return \view('home');
        }
        
        return \redirect('/CerrarSession');
        
    }
}
