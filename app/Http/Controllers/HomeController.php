<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function map_view()
    {
      return view('backend.map.map');
    }

    function property_view()
    {
      return view('backend.property.index');
    }

    function inspection()
    {
      $data = Property::orderBy('sort_id', 'asc')->get();
      return view('backend.drag_drop.index', compact('data'));
    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
                $menu = Property::find($id);
                $menu->sort_id = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }


}
