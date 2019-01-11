<?php

namespace App\Http\Controllers\home;

use App\Order;
use App\Type;
use App\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{

    //场馆搜索
    public function  m_search(Request $request){
        //return $request;
        $word = $request->word;
        $venues = Venue::where("name","like","%".$word."%")->get();
        return $venues;
    }



    //判断当前场馆是否被关注
    private function is_ordered($venue_id,$order_date,$field_no,$order_time){
        return (bool) Order::where("venue_id",$venue_id)
        ->where("order_date",$order_date)
        ->where("field_no",$field_no)
        ->where("order_time",$order_time)
        ->first();
    }


    // 我的关注
    public function my_follows(){

        $venues = Auth::user()->venues;  // 不加小括号代表数据-- 当前用户关注的所有场馆
        //dd($venues->toArray());
        return view("venue/my_follows",compact("venues"));

    }

    // 我的关注(m)
    public function m_my_follows(){

        $venues = Auth::user()->venues;  // 不加小括号代表数据-- 当前用户关注的所有场馆

        return $venues;

    }


    // 关注场馆
    public function follow($id){

        // 1 user_id;
        // 2 venue_id
        // 3 向 user_venue 追加记录;  6  18

        // venues() 关联关系对象 (多对多)
        Auth::user()->venues()->attach($id);


        // 加小括号   对象  方法;
        // 不加小括号 数据  （当前用户关注的所有场馆）

        return redirect("/venue/list");

    }

    // 取消关注
    public function unfollow($id){

        Auth::user()->venues()->detach($id);
        return redirect("/venue/list");

    }

    // 在我的关注中  取消关注
    public function unfollow2($id){

        Auth::user()->venues()->detach($id);
        return redirect("/venue/my_follows");

    }

    //（M）关注场馆
    public function m_follow($id){

        Auth::user()->venues()->attach($id);

        return response()->json(["status"=>"200","msg"=>"m_follow->success"]);
        //return $id;

    }
    //(m)取消关注
    public function m_unfollow($id){
        Auth::user()->venues()->detach($id);
        return response()->json(["status"=>"200","msg"=>"m_unfollow->success"]);
    }

    //场馆列表(全部)
    public function  list(){

        $venues = Venue::paginate(6);
        $types = Type::all();

        return view("venue/list",compact("venues","types"));

    }

    //场馆列表(m)
    public function  m_list(){

        $venues = Venue::paginate(6);
       //dd($venues->toArray());

        $arr = $venues->toArray();
        $list = $arr["data"];

        for($i=0;$i<count($list);$i++){

            $venue_id = $list[$i]['id'];
            $venue = Venue::find($venue_id);
            $list[$i]['type_id'] = $venue->type->name;

        }
        /*for($i=0;$i<count($arr['data']);$i++){
        $type_id = $arr['data'][$i]['type_id'];
        $arr['data'][$i]['type_name'] = $this->get_type_name($type_id);
        }*/
        return $list;

        //dd($arr['data']);
    }
    //获取栏目名称
    private function get_type_name($type_id){
        $type = Type::find($type_id);
        return $type->name;
    }



    //场馆列表(某个栏目)
    public function  type($id){

        $venues = Venue::where("type_id",$id)->paginate(6);
        $types = Type::all();

        return view("venue/list",compact("venues","types"));

    }


    // 时段列表
    private function get_time_list(){
        $arr=Array();
        for($i=9;$i<=22;$i++){
            $arr[]=$i;
        }
        return $arr;
    }

    // 场馆详情
    public function detail($id){

        $times = $this->get_time_list();

        $venue = Venue::find($id);
        $types = Type::all();

        $dates = $this->get_dates();  // 日期列表
        $date_list = $this->get_date_list($id); // 每个日期内容

        $today = date("Y-m-d", time());
        return view("venue/detail",compact("venue","types","dates","date_list","today","times"));

    }

    // 场馆详情(m)
    public function m_detail($id){

        $venue=Venue::find($id);
        //判断当前场馆是否被关注
        $venue->is_follow = $venue->isfollowed();
        return $venue;

    }


    // 获取每个日期内容
    private function get_date_list($id){
        $venue_id = $id;
        $date_list = Array();
        $dates = $this->get_dates();

        for($i=0;$i<count($dates);$i++){
            $order_date = $dates[$i]["date"];
            $date_list[$order_date]= $this->get_field_list($venue_id,$order_date);
        }

        //dd($date_list);
        return $date_list;

        /*
         * Array(
         *    "2019-1-5"=>Array("1"=>"60 60 60","2"=>"60 60 60","3"=>"60 60 60"),
         *    "2019-1-6"=>Array("1"=>"60 60 60","2"=>"60 60 60","3"=>"60 60 60"),
         *    "2019-1-7"=>Array("1"=>"60 60 60","2"=>"60 60 60","3"=>"60 60 60")
         * )
         *
         * */

    }

    // 获取每个场地信息
    private function get_field_list($venue_id,$order_date){

        $venue = Venue::find($venue_id);
        $arr = Array();
        for($i=1;$i<=$venue->num;$i++){
            $field_no = $i;
            $arr[$i]=$this->get_time_prices($venue_id,$order_date,$field_no);
        }
        return $arr;

    }

    // 获取当前场馆对应的时间价格列表

    private function get_time_prices($venue_id,$order_date,$field_no){
        $venue = Venue::find($venue_id);
        $prices = $venue->prices->toArray(); // 当前场馆的价格
        $arr = Array();

        for($i=0;$i<count($prices);$i++){

            $order_time = $prices[$i]["time"];
            $price = $prices[$i]["price"];
            $arr[$order_time]['price']=$price;
            $arr[$order_time]["is_ordered"] = $this->is_ordered($venue_id,$order_date,$field_no,$order_time);

        }

        //dd($arr);
        return $arr;

        /*
         * Array("9"=>45,"10"=>"45","11"=>60)
         *
         *
         * */

    }



    // 获取日期列表
    private function get_dates(){

        $arr = Array();
        for($i=0;$i<7;$i++){
            $arr[$i]["date"]=date("Y-m-d", time()+24*60*60*$i);
            $day = date("N",time()+24*60*60*$i);
            $week=Array("星期一","星期二","星期三","星期四","星期五","星期六","星期日");
            $arr[$i]["week"]=$week[$day-1];
        }
        return $arr;

    }


    // 创建场馆
    public function create(){
        $types = Type::all();
        return view("venue/create",compact("types"));
    }


    // 保存场馆
    public function save(Request $request){

        // 1 验证
        $this->validate(request(),[
            "name"=>"required|string|min:6|max:50",
            "address"=>"required|string|min:6"
        ]);


        // 2 业务逻辑
        $data = $request->except("_token");
        $data["user_id"]= Auth::id();

        //dd($data);

        Venue::create($data);

        //3 视图

        return redirect("venue/my_venues");

    }

    // 我的场馆
    public function my_venues(){

        // 1 获取当前登录用户id

        // 2 去venues表中查询当前用户所创建的所有场馆;

        $user_id = Auth::id();
        $venues = Venue::where("user_id",$user_id)->get();

        //dd($venues->toArray());

        return view("venue/my_venues",compact("venues"));

    }


    // 删除场馆
    public function delete($id){
        Venue::destroy($id);
        return redirect("venue/my_venues");
    }


    // 修改场馆
    public function edit($id){

        $venue = Venue::find($id);
        $types = Type::all();
        return view("venue/edit",compact("venue","types"));

    }

    // 保存修改
    public function update(Request $request){

        // 当前场馆实例对象
       $venue = Venue::find($request->id);
       $data = $request->except("_token","id");
       $venue->update($data);
       return redirect("venue/my_venues");

    }




}
