@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item"><a href="{{url('spanel/users')}}">Kullanıcı İşlemleri</a></li>
    <li class="breadcrumb-item active">Kullanıcı Güncelle</li>
@endsection
@section('content')
    <div class="col-md-12 bg-white">
        <form class="required" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/spanel/users/'.$user->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="fileinput fileinput-exists d-block" data-provides="fileinput">
                            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: auto; height: auto;">
                                @if($user->avatar=='')
                                    <img src="{{asset('assets\spanel\img\no-avatar.png')}}" class="img-fluid mx-auto d-flex" alt="{{ $user->name }}">
                                @else
                                    <img src="{{asset($user->avatar)}}" class="img-fluid mx-auto d-flex" alt="{{ $user->name }}">
                                @endif
                            </div>
                            <div class="fileinputbtn">
                                <a href="#" class="btn fileinput-exists btn-sm btn-danger float-right ml10" data-dismiss="fileinput">Sil</a>
                                <div class="btn-file float-right">
                                    <span class="fileinput-new btn-sm btn btn-success">Resim Seç</span>
                                    <span class="fileinput-exists btn btn-sm btn-info">Değiştir</span>
                                    <input type="file" name="avatar">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Kullanıcı Adı</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Kullanıcı Adı" required name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Posta</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">@</span>
                            <input type="email" class="form-control" placeholder="E-Posta" required name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Yetki</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon">Y</span>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{!! $role->id !!}" @if($role->id==$user->role_id) selected @endif>{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Parola</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" id="password" class="form-control" name="password" autocomplete="off" placeholder="Parola">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Parola Tekrar</label>
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="password" class="form-control" name="password_again" autocomplete="off" placeholder="Parola Tekrar">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger float-right">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/spanel/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/spanel/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/spanel/plugins/jquery-validation/localization/messages_tr.min.js')}}"></script>
    <script>
        $().ready(function() {
            $("form.required").validate({
                rules: {
                    password: {
                        required: false,
                        maxlength: 10,
                        minlength: 1
                    },
                    password_again: {
                        equalTo: "#password"
                    }
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
@endsection
