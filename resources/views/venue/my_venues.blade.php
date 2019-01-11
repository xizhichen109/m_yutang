@extends('layouts.app')

@section('content')
    <div class="container venue_create">
        <div class="row">
            <div class="col-md-2">
               <sidebar></sidebar>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        我的场馆
                    </div>
                    <div class="panel-body">
                       <table class="table table-striped table-bordered">
                           <tr>
                               <th>id</th>
                               <th>场馆名称</th>
                               <th>创建日期</th>
                               <th>状态</th>
                               <th>操作</th>
                           </tr>
                           @foreach($venues as $venue)
                           <tr>
                               <td>{{$venue->id}}</td>
                               <td>{{$venue->name}}</td>
                               <td>{{$venue->created_at}}</td>
                               <td>{{$venue->state}}</td>
                               <td>
                                   <a href="/venue/edit/{{$venue->id}}">修改</a>
                                   <a href="/venue/delete/{{$venue->id}}">删除</a>
                                   <a href="/price/set/{{$venue->id}}">价格</a>

                               </td>
                           </tr>
                           @endforeach
                       </table>
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
