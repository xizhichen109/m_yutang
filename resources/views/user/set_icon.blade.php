@extends('layouts.app')

@section('content')
    <div class="container set_icon pt20">
        <div class="row">
            <div class="col-md-2">
                <sidebar></sidebar>
            </div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       头像设置
                    </div>
                    <div class="panel-body">

                        <form method="POST" action="/user/save_icon" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="user_icon">
                                <img src="/upload/{{$user->icon}}" class="img-responsive">
                            </div>
                            <div class="form-group">
                                <label for="set_icon">File input</label>
                                <input type="file" id="set_icon" name="icon">
                                <p class="help-block">请选择jpg格式的文件</p>
                            </div>

                            <button type="submit" class="btn btn-info">保存头像</button>

                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
