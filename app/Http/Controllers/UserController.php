<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
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
}