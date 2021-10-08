<?php

use App\Helpers;
use Illuminate\Support\Str;

use App\Models\Property;
use Carbon\Carbon;
use App\Models\Orders;
use App\Models\User;
use App\Models\Profile;

function getAllProperty()
{
  return Property::latest()->get();
}

function findLat($id)
{
  return Property::where('id', $id)->first();
}

function findProperty($id)
{
  return Property::where('id', $id)->first();
}

function findUser($id)
{
  return User::where('id', $id)->first();
}

function findProfile($id)
{
  return Profile::where('user_id', $id)->first();
}

function checkProfile($id)
{
  return Profile::where('user_id', $id)->get();
}
// function time($id)
// {
//   return 1;
//   // if (Orders::where('user_id', Auth::user()->id)->where('property_id', $id)->first()->to > Carbon::today()) {
//   //   return 0;
//   // }
//   // else {
//   //   return 1;
//   // }
// }

function userOrders($id)
{
  return Orders::where('user_id', $id)->get();
}

function findOrders()
{
  return Orders::latest()->paginate(8);
}

function countUser()
{
  return User::all()->count();
}

function countOrder()
{
  return Orders::all()->count();
}

function Countproperty()
{
  return Property::all()->count();
}