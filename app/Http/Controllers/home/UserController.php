<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // 设置头像
    public function set_icon(){
        $user = Auth::user();
        return view("user/set_icon",compact("user"));

    }


    // 保存头像
    public function save_icon(Request $request){

        //dd($request);

        $path=base_path("public\upload\\");

        $old_icon = $path.Auth::user()->icon;  // /upload/1546568095.jpg 原图绝对路径

        $exist = Auth::user()->icon;  // 原图是否存在


        if ($request->hasFile('icon')) {

            $file = $request->file('icon');  //获取UploadFile实例

            if ( $file->isValid()) { //判断文件是否有效

                //上传图片
                $ext = $file->getClientOriginalExtension(); //扩展名
                $file_name = time() . "." . $ext;    //重命名
                $res=$file->move($path, $file_name); //移动至指定目录

                // 保存新图
                $user=User::find(Auth::id());
                $user->icon= $file_name;
                $user->save();


                // 删除原图
                if($exist){
                    unlink($old_icon);
                }


            }
        }

        return redirect("user/set_icon");



    }

}

