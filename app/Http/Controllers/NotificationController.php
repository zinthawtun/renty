<?php

namespace App\Http\Controllers;

use App\Mail\sendInvitation;
use App\Mail\sendNotification;
use App\N_type;
use App\Notification;
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


    public function showLinks($id)
    {

        $users = User::all()->where('linked_property', $id);
        return view('notifications.landlordview', compact('users'));
    }

    public function messages($id)
    {
        $pid = $id;
        $messages = Notification::where('user_id', $id)->latest()->simplePaginate(5);
        return view('notifications.messages', compact('messages', 'pid'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function createMessages($id)
    {
        $n_types = N_type::all();
        $user = User::find($id);
        return view('notifications.createMessages', compact('n_types', 'user'));
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
            'message' => 'required',
             'n_id' => 'required',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessages($id, Request $request)
    {

        $user = User::find($id);
        $l_user = auth()->user();

        Notification::create([
            'user_id' => $user['id'],
            'message' => $request['message'],
            'n_id' => $request['n_type'],
            'p_id' => auth()->id(),
        ]);

        $email = $user['email'];

        Mail::to($email)->send(new sendNotification($user, $l_user));


    }
}


