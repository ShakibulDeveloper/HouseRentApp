<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\rentMail;

use Mail;

class OrdersController extends Controller
{
    function store(Request $request)
    {

      if (Orders::where('user_id', $request->user_id)->where('property_id', $request->property_id)->count() > 0) {
        //store
        $order = Orders::where('user_id', $request->user_id)->where('property_id', $request->property_id)->first();
        $order->user_id = $request->user_id;
        $order->property_id = $request->property_id;
        $order->name = $request->name;
        $order->family_member = $request->member;
        $order->card_number = $request->card_number;
        $order->expiration = $request->expiration;
        $order->security_code = $request->code;
        $order->from = Carbon::today();
        $order->to = Carbon::today()->addDays(7);
        $order->save();

      }
      else {
        $order = new Orders;
        $order->user_id = $request->user_id;
        $order->property_id = $request->property_id;
        $order->name = $request->name;
        $order->family_member = $request->member;
        $order->card_number = $request->card_number;
        $order->expiration = $request->expiration;
        $order->security_code = $request->code;
        $order->from = Carbon::today();
        $order->to = Carbon::today()->addDays(7);
        $order->save();
      }

      return back()->with('success', 'Done Successfully!');
    }

    // send mail
    function mail_send($id)
    {
      $user_id = Orders::where('id', $id)->first()->user_id;
      $property_id = Orders::where('id', $id)->first()->property_id;
      $user_email = User::where('id', $user_id)->first()->email;


      $details = [
        'p_id' => $property_id
      ];

      try {
        Mail::to($user_email)->send(new rentMail($details));
      } catch (\Throwable $th) {
        //throw $th;
      }

      return back()->with('success', 'Mail Send Successfully!');

    }
}
