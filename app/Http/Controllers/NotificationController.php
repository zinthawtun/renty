<?php

namespace App\Http\Controllers;

use App\Mail\sendInvitation;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;


class NotificationController extends Controller
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

    public function createInvite($id)
    {

        $property = Property::find($id);
        return view('notifications.invitation', compact('property'));

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'email' => 'required',
            'expired_date'      => 'required|date|after:yesterday',
        ]);
    }

    public function sendInviteMail($id, Request $request)
    {
        $property = Property::find($id);
        $p_key =  str_random(25);
        $property->property_key = $p_key;
        $property->expired_date = $request['expired_date'];
        $property->save();

        $email = $request['email'];

        Mail::to($email)->send(new sendInvitation($property));

        return redirect('/home')->with('status', 'You have successfully sent invitation letter');

    }

    public function connectP(){
        return view('properties.connect');
    }

    public function sendConnectP(Request $request){
//
               $f_key = Property::where('property_key', $request['property_key'])->first();
               if(isset($f_key)){
                   $user = User::find(auth()->id());
                   $user->property_key = $request['property_key'];
                   $user->save();

                   return redirect()->route('home')->with('status', 'You have successfully connected');

               }
               else{
                   return view('properties.connect')->with('warning', 'You are using the wrong key');
               }



    }
}
