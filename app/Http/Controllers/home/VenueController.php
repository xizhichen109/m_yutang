<?php

namespace App\Http\Controllers\home;


use App\Type;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueController extends Controller
{
    //场馆列表(全部)
    public function  list(){

        $venues = Venue::paginate(6);
        $types = Type::all();

        return view("venue/list",compact("venues","types"));

    }

    //场馆列表(某个栏目)
    public function  type($id){

        $venues = Venue::where("type_id",$id)->paginate(6);
        $types = Type::all();

        return view("venue/list",compact("venues","types"));

    }
}
