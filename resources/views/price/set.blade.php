@extends('layouts.app')

@section('content')
    <div class="container venue_price pt20">
        <div class="row">
            <div class="col-md-2">
                <sidebar></sidebar>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        价格设置
                    </div>
                    <div class="panel-body">
                        <h3>{{$venue->name}}</h3>

                        <table class="table table-striped table-bordered my_price">
                            <tr>
                                <th>id</th>
                                <th>时段</th>
                                <th>价格</th>
                                <th>操作</th>
                            </tr>

                            @foreach($prices as $price)
                                <tr>
                                    <td>{{$price->id}}</td>
                                    <td>{{$price->time}}</td>
                                    <td><input type="text" value="{{$price->price}}"></td>
                                    <td><button class="btn btn-info btn-sm save_price">保存</button></td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
