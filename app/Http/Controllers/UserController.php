<?php

namespace App\Http\Controllers;

use App\Ranks;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use willvincent\Rateable\Rateable;

class UserController extends Controller
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

    public function profile(){
        return view('profile.profile', array('user' => Auth::user()) );
    }

    public function profileEdit(){
        return view('profile.edit', array('user' => Auth::user()) );
    }

    public function profileUpdate($id, Request $request){

        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return view('profile.profile', array('user' => Auth::user()) )->with('status', 'Successfully updated');
    }

    public function update_avatar(Request $request){

        request()->validate([

            'avatar' => 'max:50000|required|image|mimes:jpeg,png,jpg,gif,svg',


        ]);

        $user = Auth::user();

        $old = User::find($user->id);

        $old->avatar;

        if (!empty($old->avatar)) {

            \File::delete(public_path('/uploads/avatars/' . $old->avator));

            $old->avatar = null;

        }

            // Handle the user upload of avatar
        if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

                $user->avatar = $filename;
                $user->save();
        }



        return view('profile', array('user' => Auth::user()) );

    }

    public function lReview(){

        $lrates = User::where('role_id', 2)->simplePaginate(10)->all();
        return view('ranks.lreviews', compact('lrates') );

    }

    public function tReview(){

        $trates = User::where('role_id', 1)->simplePaginate(10)->all();
        return view('ranks.treviews', compact('trates') );
    }

    public function showReview($id)
    {
        $review = User::find($id);
        return view('ranks.shReview',compact('review'));
    }


    public function postReview(Request $request)
    {
        $user = auth()->user();
        request()->validate(['rate' => 'required']);
        $review = User::find($request->id);

        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = 0;
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;
        $rating->count = 1;

        $review->ratings()->save($rating);

        if($user->role_id==2)
        {
            $trates = User::where('role_id', 1)->simplePaginate(10)->all();
            return view('ranks.treviews',compact('trates'))->with('status', 'Thanks, You have ranked a user.');
        }
        if($user->role_id==1)
        {
            $lrates = User::where('role_id', 2)->simplePaginate(10)->all();
            return view('ranks.lreviews', compact('lrates'))->with('status', 'Thanks, You have ranked a user.');
        }

    }

//    public function rReview(){
//        return view('reviews');
//    }
}