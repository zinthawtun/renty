<?php

namespace App\Http\Controllers;

use App\Property;
use App\User;
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
        $uid = auth()->user();
        $properties = Property::all()->where('user_id', $uid->id);
        if($uid->role_id == 1)
        {
        $c_property = Property::where('user_id', $uid->id)->first();
        if ($c_property != null)
        {
        $no_t = User::all()->where('linked_property', $c_property->id)->count();
        }
        }
        if($uid->role_id == 2)
        {
        $l_properties = Property::all()->where('property_key', $uid->property_key);
        }
        return view('home', compact('properties', 'l_properties', 'no_t'));
    }
}
