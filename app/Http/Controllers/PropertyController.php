<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Orders;
use Auth;
use Carbon\Carbon;

class PropertyController extends Controller
{

  //view
  function view()
  {
    return view('frontend.property.view');
  }

  //store
  function store(Request $request)
  {

    $validate = $request->validate([
    "title"    => "required",
    "price"  => "required",
    "area"  => "required",
    "rooms"  => "required",
    "type"  => "required",
    "kind"  => "required",
    "discription"  => "required",
    "bedrooms"  => "required",
    "bathrooms"  => "required",
    "garages"  => "required",
    "inspection_date"  => "required",
    "inspection_time"  => "required",
    ]);

    $property = new Property;
    $property->title = $request->title;
    $property->price = $request->price;
    $property->area = $request->area;
    $property->rooms = $request->rooms;
    $property->type = $request->type;
    $property->kind = $request->kind;
    $property->location = $request->location;
    $property->latitute = $request->lat;
    $property->longitute = $request->lon;
    $property->discription = $request->discription;
    $property->user_id = Auth::user()->id;

    $property->bedrooms = $request->bedrooms;
    $property->bathrooms = $request->bathrooms;
    $property->garages = $request->garages;
    $property->inspection_date = $request->inspection_date;
    $property->inspection_time = $request->inspection_time;
    $property->status = 1;
    $property->save();
    $getInsertedID = $property->id;

    if ($request->hasFile('image')) {
      $photo_file_name = 'image'.$getInsertedID.'.'.$request->image->getClientOriginalExtension();
      $request->image->move(public_path('uploads/images'), $photo_file_name);

      $update_property = Property::where('id', $getInsertedID)->first();
      $update_property->image = $photo_file_name;
      $update_property->save();
    }

    $property_update = Property::where('id', $getInsertedID)->first();
    $property_update->sort_id = $getInsertedID;
    $property_update->save();

    return back()->with('sucess', "A new property added successfully!");

  }


  //Navigate
  function navigate($id)
  {
    $property_id = $id;
    return view('backend.property.navigate',compact('property_id'));
  }

  //inspection
  function inspection($id)
  {
    $property_id = $id;
    return view('backend.property.inspection',compact('property_id'));
  }

  //inspection update
  function inspection_update(Request $request)
  {
    $property = Property::where('id', $request->id)->first();
    $property->inspection_date = $request->date;
    $property->inspection_time = $request->time;
    $property->save();

    return back()->with('success', 'Update Successfully!');
  }

  // property details
  function details($id)
  {
    $property_id = $id;

    if (Orders::where('user_id', Auth::user()->id)->where('property_id', $id)->count() > 0) {


      if (Orders::where('user_id', Auth::user()->id)->where('property_id', $id)->first()->to >= Carbon::today()) {
        $time = "active";
      }
      else {
        $time = 'clear_due';
      }


    }
    else {
      $time = 'rent';
    }

    return view('frontend.property.details',compact('property_id', 'time'));
  }
}
