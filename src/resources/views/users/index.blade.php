@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item active">Kullanıcı İşlemleri</li>
@endsection
@section('content')
    <div class="col-md-12 bg-white pt25">
        <a href="#"  data-toggle="modal" data-target="#kullaniciekle" class="btn btn-info btn-sm mb20"><i class="fa fa-user-plus mr10"></i>Kullanıcı Ekle</a>
        <table class="table table-striped table-hover table-responsive text-center">
            <thead>
            <tr>
                <th class="text-center">Avatar</th>
                <th class="text-center">Kullanıcı Adı</th>
                <th class="text-center">Email</th>
                <th class="text-center">Yetki</th>
                <th class="text-center">Aktif</th>
                <th class="text-center">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr id="user{{$user->id}}" @if($user->id == Auth::user()->id) class="table-info" @endif>
                    <td class="align-middle">
                        @if($user->avatar=='')
                            <img src="{{asset('assets\spanel\img\no-avatar.png')}}" height="40" alt="{{ $user->name }}">
                        @else
                            <img src="{!! asset($user->avatar) !!}" alt="{!! $user->name !!}" height="40">
                        @endif
                    </td>
                    <td class="align-middle">{!! $user->name !!}</td>
                    <td class="align-middle">{!! $user->email !!}</td>
                    <td class="align-middle">{!! $user->role->name !!}</td>
                    <td class="align-middle">
                        <input type="checkbox" datatype="{!! $user->id !!}" id="check{!! $user->id !!}" name="active" {{ $user->active ? 'checked' : '' }} class="js-switch">
                    </td>
                    <td class="align-middle" style="width: 85px;">
                        @if($user->id != Auth::user()->id)
                        <a href="{{url('spanel/users/'.$user->id.'/edit')}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        <a href="#" datatype="{!! $user->id !!}" class="btn btn-sm btn-danger sil"><i class="fa fa-remove"></i></a>
                        @else
                            <a href="{{route('profile')}}" class="btn btn-sm btn-info"><i class="fa fa-user"></i></a>
                            <a href="{{url('spanel/password')}}" class="btn btn-sm btn-info"><i class="fa fa-key"></i></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade bd-example-modal-lg" id="kullaniciekle" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt0">
            <div class="modal-content br0" style="border-top:none;">
                <form class="required" action="users" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Kullanıcı Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 pt50">
                            <div class="form-group mt20">
                                <div class="fileinput fileinput-new d-block" data-provides="fileinput">
                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: auto; height: auto;">
                                        <img src="{{asset('assets\spanel\img\no-avatar.png')}}" class="img-fluid mx-auto d-flex" alt="Kullanıcı Resim">
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
                                    <input type="text" class="form-control" placeholder="Kullanıcı Adı" required name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Posta</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon">@</span>
                                    <input type="email" class="form-control" placeholder="E-Posta" required name="email">
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
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required placeholder="Parola">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Parola Tekrar</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password_again" autocomplete="off" required placeholder="Parola Tekrar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-sm btn-primary">Kaydet</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/spanel/plugins/switchery/css/switchery.min.css') }}">
@endsection
@section('js')
    <script src="{{asset('assets/spanel/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/spanel/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/spanel/plugins/jquery-validation/localization/messages_tr.min.js')}}"></script>
    <script src="{{ asset('assets/spanel/plugins/switchery/js/switchery.min.js')}}"></script>
    <script>
        $().ready(function() {
            $("form.required").validate({
                rules: {
                    password: {
                        required: true,
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
        $('.sil').click(function () {
            var sildeger = $(this).attr('datatype');
            swal({
                    title: "Eminmisiniz?",
                    text: "Kullanıcıyı sistemden silmeye eminmisiniz?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Kullanıcı Sil!",
                    cancelButtonText: "Vazgeç",
                    closeOnConfirm: false
                },
                function(){
                        $.ajax({
                            type: "DELETE",
                            url: 'users/'+sildeger+'',
                            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                            success: function (data) {
                                $('#user'+sildeger+'').remove();
                                swal("Silindi!", "Kullanıcı başarıyla silindi.", "success");
                            },
                            error: function (data) {
                                swal("Başarısız", "Kullanıcı Silinemedi.", "error");
                            }
                        });
                });
            return false;
        });

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html,defaults = {
                color             : '#2a85c6'
                , secondaryColor    : '#dfdfdf'
                , jackColor         : '#fff'
                , jackSecondaryColor: null
                , className         : 'switchery'
                , disabled          : false
                , disabledOpacity   : 0.5
                , speed             : '0.1s'
                , size              : 'small'
            });
        });
        $(elems).on("change" , function() {
            var check = $(this).attr('datatype');
            var changeCheckbox = document.querySelector('#check'+check+'');
            $.ajax({
                type: "PUT",
                url: 'users/active/'+check+'/'+changeCheckbox.checked+'',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    swal("Başarılı", "Kullanıcı başarıyla "+data.message+".", data.type);
                },
                error: function (data) {
                    swal("Başarısız", "İşlem yaparken bir hata oluştu.", "warning");
                }
            });
            //alert(changeCheckbox.checked);
        });

    </script>
@endsection
