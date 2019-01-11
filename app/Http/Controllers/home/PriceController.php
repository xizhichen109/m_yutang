<?php

namespace App\Http\Controllers\home;

use App\Price;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    //价格初始化
    public function init($id){

        // venue_id  time  price

        for($time=9;$time<23;$time++){
            $price = new Price();
            $price->venue_id = $id;
            $price->time = $time;
            $price->price = 50;
            $price->save();
        }


    }

    // 设置场馆价格
    public function set($id){

        // 获取当前场馆所有的价格数据

        $venue = Venue::find($id); // 获取当前场馆实例对象;

        $prices = $venue->prices;  // 当前场馆的所有价格数据;

        //dd($prices->toArray());

        return view("price/set",compact("prices","venue"));
    }


    // 保存价格
    public function save_price(Request $request){
        // 更新价格
        $price = Price::find($request->id);
        $price->price = $request->price;
        $price->save();

        return response()->json(["satus"=>"3000","msg"=>"save success"]);
    }


}
