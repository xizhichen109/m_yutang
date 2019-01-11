@extends('layouts.app')

@section('content')
    <div class="container venue_detail">
        <div class="row">
            <ul class="type_nav">
                @foreach($types as $type)
                    <li><a href="/venue/type/{{$type->id}}">{{$type->name}}</a> </li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-md-5">
              <img src="/images/ymq.jpg">
            </div>
            <div class="col-md-7">
                <h3 class="venue_title">{{$venue->name}}</h3>
                <p>地址: {{$venue->address }}</p>
                <p>类型: {{$venue->type->name}}</p>
                <p>电话: {{ $venue->tel }}</p>
                <p>场馆简介:<br> {{$venue->des}}</p>
            </div>
        </div>
        <div class="row order_wrap">
            <div class="col-md-9">
                <div class="order_header">
                    @foreach($dates as $key=>$date)
                        <dl @if($key==0) class="active" @endif>
                            <dt>{{$date['date']}}</dt>
                            <dd>{{$date['week']}}</dd>
                        </dl>
                    @endforeach
                </div>
                <div class="order_body">
                      <div class="time_list">
                          <dl>
                              <dt>&nbsp;</dt>
                              <dd>
                                  <ul>
                                      @foreach($times as $time)
                                      <li>{{$time}}</li>
                                      @endforeach
                                  </ul>
                              </dd>
                          </dl>
                      </div>

                    @foreach($date_list as $date=>$list)

                        <div class="day_list @if($date == $today) show @endif">

                                @foreach($list as $field_no=>$prices)
                                <dl>
                                    <dt>场地编号:{{$field_no}}</dt>
                                    <dd>
                                        <ul>
                                            @foreach($prices as $time=>$price)
                                            <li data-time="{{$time}}" data-field_no="{{$field_no}}" @if($price["is_ordered"]) class="ordered" @endif>{{$price['price']}}</li>
                                            @endforeach
                                        </ul>
                                    </dd>
                                </dl>
                                @endforeach

                        </div>

                    @endforeach


                </div>

            </div>
            <div class="col-md-3">

                <div class="item_template">
                    <dl class="item">
                        <dt>15:00-16:00</dt>
                        <dd>B3号场</dd>
                    </dl>
                </div>

                <div class="order_detail">
                    <p>场地类型:羽毛球场</p>
                    <p>订单时间:
                        <span class="order_date">{{$today}}</span>
                        <input type="hidden" value="{{$venue->id}}" class="venue_id">
                    </p>
                    <div class="detail_wrap">


                    </div>
                    <div class="btn_wrap">
                        <span>总价:160元</span>
                        <button id="save_order">立即下单</button>
                    </div>
                </div>
            </div>
        </div>
        {{--模态框--}}
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">提示信息</h4>
                    </div>
                    <div class="modal-body">
                        <p>订单保存成功&hellip;</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
@endsection

