<?php

namespace App\Http\Controllers;

use App\Mail\sendInvitation;
use App\Mail\sendNotification;
use App\Mail\updateMessage;
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
        if(auth()->user()->role_id == 1){
            $users = User::all()->where('linked_property', $id);
            return view('notifications.landlordview', compact('users'));
        }
        else{
            return view('home');
        }

    }

    public function messages($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $s_messages = Notification::where('p_id', $user->id)->where('user_id', $id)->latest()->simplePaginate(5);
            return view('notifications.messages', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        if($user->role_id == 2){
            $s_messages = Notification::where('p_id', $user->id)->where('user_id', $id)->simplePaginate(5);
            return view('notifications.t_message', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }



    }

    public function messages2($id)
    {
        $user = auth()->user();
        if($user->role_id == 1){
            $r_messages = Notification::where('user_id', $user->id)->latest()->simplePaginate(5);
            return view('notifications.messages2', compact( 'id', 'r_messages'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        if($user->role_id == 2){
            $r_messages = Notification::where('user_id', $user->id)->latest()->simplePaginate(5);
            return view('notifications.t_message2', compact( 'id', 'r_messages'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }



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

        $g_user = auth()->user();
        if($g_user->role_id == 1){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $id)->latest()->simplePaginate(5);
            return view('notifications.messages', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Posted');
        }
        if($g_user->role_id == 2){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $id)->simplePaginate(5);
            return view('notifications.t_message', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Posted');
        }

    }

    public function editMessages($id)
    {
        $n_types = N_type::all();
        $notification = Notification::find($id);
        return view('notifications.update', compact('notification', 'n_types'));


    }

    public function updateMessages($id, Request $request)
    {


        $notification = Notification::find($id);
        $notification->message=$request['message'];
        $notification->n_id=$request['n_type'];
        $notification->save();

        $id = $notification->user_id;

        $g_user = auth()->user();
        $e_user = User::find($notification->user_id);

        Mail::to($e_user->email)->send(new updateMessage($notification, $e_user));

        if($g_user->role_id == 1){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $notification->user_id)->latest()->simplePaginate(5);
            return view('notifications.messages', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Updated');

        }
        if($g_user->role_id == 2){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $notification->user_id)->simplePaginate(5);
            return view('notifications.t_message', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Updated');
        }

    }

    public function deleteMessages($id)
    {

        $notification = Notification::find($id);
        $notification->delete();


        $g_user = auth()->user();


        if($g_user->role_id == 1){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $notification->user_id)->latest()->simplePaginate(5);
            return view('notifications.messages', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Updated');

        }
        if($g_user->role_id == 2){
            $s_messages = Notification::where('p_id', $g_user->id)->where('user_id', $notification->user_id)->simplePaginate(5);
            return view('notifications.t_message', compact('s_messages', 'id'))
                ->with('i', (request()->input('page', 1) - 1) * 5)->with('status', 'Successfully Updated');
        }


    }

}


