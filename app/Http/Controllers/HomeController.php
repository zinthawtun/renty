<?php

namespace App\Http\Controllers;

use App\Property;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Auth()->id();
        $properties = Property::all()->where('user_id', $uid);
        return view('home', compact('properties'));
    }
}
