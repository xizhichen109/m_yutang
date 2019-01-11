<?php

namespace App\Http\Controllers\home;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //保存订单
    public function save(Request $request){
        $date = date("Y-m-d H:m:s",time());
        $items = $request->items;
        for($i=0;$i<count($items);$i++){
            $order = new Order();
            $order->user_id = Auth::id();
            $order->venue_id = $request->venue_id;
            $order->order_date = $request->order_date;
            $order->field_no = $items[$i]['field_no'];
            $order->order_time = $items[$i]['order_time'];
            $order->created_at = $date;
            $order->updated_at = $date;

            $order->save();
        }
    }


}
