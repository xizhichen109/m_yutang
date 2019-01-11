<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;

class GameController extends Controller
{


    // 活动列表(m)
    public function m_list(){
        $games = Game::all();
        return $games;
    }

    // 活动详情(m)
    public function m_detail($id){
        $game = Game::find($id);
        return $game;
    }


    //保存活动(m)
    public function m_save(Request $request){

        $game = new Game();
        $game->name= $request->name;
        $game->venue_id= $request->venue_id;
        $game->des= $request->des;
        $game->start_date= $request->start_date;
        $game->start_time= $request->start_time;
        $game->hours= $request->hours;
        $game->close_time= $request->close_time;
        $game->user_num= $request->user_num;
        $game->price= $request->price;
        $game->save();

        return response()->json(["status"=>200]);

    }
}
