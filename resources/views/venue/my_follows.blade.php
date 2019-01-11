@extends('layouts.app')

@section('content')
    <div class="container venue_my_follows">
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

                        @foreach($venues as $venue)

                            <div class="venue_item">
                                <div class="pic"><img src="/images/venue_icon.jpg" class="img-responsive img-rounded"></div>
                                <div class="txt">
                                    <h3><a href="/venue/detail/{{$venue->id}}">{{$venue->name}}</a></h3>
                                    <p>{{$venue->des}}</p>
                                    <p>{{$venue->created_at}} &nbsp; &nbsp;
                                        <a href="/venue/unfollow2/{{$venue->id}}" > 取消关注</a>
                                    </p>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
