<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Orders;

class ProfileController extends Controller
{
    function index($id)
    {
      $user_id = $id;
      return view('frontend.profile.index', compact('user_id'));
    }


    function update($id)
    {
      $user_id = $id;
      $users = Profile::where('user_id', Auth::user()->id)->get()->count();

      if ($users > 0) {
        $user = Profile::where('user_id', Auth::user()->id)->first();
        $status = 1;
      }
      else {
        $user = 'empty';
        $status = 0;
      }

      return view('backend.profile.update', compact('user_id','users', 'user',  'status'));
    }

    function store(Request $request)
    {
      //upload image
      if ($request->hasFile('image')) {

        $photo_file_name = 'user'.Auth::user()->id.'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/user'), $photo_file_name);

        $user_table = User::where('id', Auth::user()->id)->first();
        $user_table->image = $photo_file_name;
        $user_table->save();
      }

      //store
      if (Profile::where('user_id', Auth::user()->id)->count() > 0) {
        // update profile details
        $profile = Profile::where('user_id', Auth::user()->id)->select('id')->first();
        $profile->user_id = Auth::user()->id;
        $profile->phone = $request->phone;
        $profile->family_member = $request->family_member;
        $profile->bio = $request->bio;
        $profile->country = $request->country;
        $profile->Address_1 = $request->address_1;
        $profile->Address_2 = $request->address_2;
        $profile->save();
      }
      else {
        $profile = new Profile;
        $profile->user_id = Auth::user()->id;
        $profile->phone = $request->phone;
        $profile->family_member = $request->family_member;
        $profile->bio = $request->bio;
        $profile->country = $request->country;
        $profile->Address_1 = $request->address_1;
        $profile->Address_2 = $request->address_2;
        $profile->save();

      }

      return redirect()->route('home')->with('update', 'Profile Update Successfully!');

    }


    function payment_details($id)
    {
      $payment = Orders::where('id', $id)->first();

      return view('backend.rent.payment', compact('payment'));
    }
}
