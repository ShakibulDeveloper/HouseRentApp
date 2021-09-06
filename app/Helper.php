<?php

use App\Helpers;
use Illuminate\Support\Str;

use App\Models\Property;


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
