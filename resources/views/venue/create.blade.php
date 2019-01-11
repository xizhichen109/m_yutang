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
                         创建场馆
                     </div>
                     <div class="panel-body">
                         <form method="POST" action="/venue/save">
                             {{csrf_field()}}
                             <div class="form-group">
                                 <label for="venue_type">场馆类型</label>
                                 <select class="form-control" name="type_id">
                                     @foreach($types as $type)
                                     <option value="{{$type->id}}">{{$type->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="venue_name">场馆名称</label>
                                 <input type="text" class="form-control" id="venue_name" placeholder="请输入场馆名称" name="name">
                             </div>
                             <div class="form-group">
                                 <label for="venue_address">场馆地址</label>
                                 <input type="text" class="form-control" id="venue_address" placeholder="请输入场馆地址" name="address">
                             </div>
                             <div class="form-group">
                                 <label for="venue_des">场馆简介</label>
                                 <textarea class="form-control" rows="5" name="des"></textarea>
                             </div>
                             <div class="form-group">
                                 <label for="venue_des">联系方式:</label>
                                 <input type="text" class="form-control"  name="tel"></input>
                             </div>

                             <div class="form-group">
                                 <div class="radio-inline">
                                     <label>
                                         <input type="radio" name="state" value="1" checked> 开馆
                                     </label>
                                 </div>
                                 <div class="radio-inline">
                                     <label>
                                         <input type="radio" name="state" value="0" > 闭馆
                                     </label>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div>
                                     @include("layouts.error")
                                 </div>
                             </div>


                             <button type="submit" class="btn btn-info">创建场馆</button>

                         </form>

                     </div>
                 </div>



             </div>
         </div>
    </div>
@endsection
