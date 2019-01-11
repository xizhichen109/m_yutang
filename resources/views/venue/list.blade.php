@extends('layouts.app')

@section('content')
    <div class="container venue_list">
        <div class="row">

            <ul class="type_nav">
                @foreach($types as $type)
                <li><a href="/venue/type/{{$type->id}}">{{$type->name}}</a> </li>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-md-9">

                @foreach($venues as $venue)

                    <div class="venue_item">
                        <div class="pic"><img src="/images/venue_icon.jpg" class="img-responsive img-rounded"></div>
                        <div class="txt">
                            <h3><a href="/venue/detail/{{$venue->id}}">{{$venue->name}}</a></h3>
                            <p>{{$venue->des}}</p>
                            <p>{{$venue->created_at}} &nbsp; &nbsp;
                            @if($venue->isfollowed())
                                <a href="/venue/unfollow/{{$venue->id}}" > 取消关注</a>
                            @else
                                <a href="/venue/follow/{{$venue->id}}" > 关注</a>
                            @endif
                            </p>
                        </div>
                    </div>

                @endforeach

                    {{$venues -> links()}}


            </div>
            <div class="col-md-3"><h3>推荐场馆</h3></div>
        </div>
    </div>
@endsection
