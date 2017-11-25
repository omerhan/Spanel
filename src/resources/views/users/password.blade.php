@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item active">Parola Güncelle</li>
@endsection
@section('content')
    <div class="col-md-12 bg-white pl30 pr30">
        <form class="required" role="form" method="POST" action="{{ url('/spanel/password') }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Mevcut Parola</label>
                        <div class="input-group input-group-sm">
                            <input type="password" class="form-control" name="old_password" autocomplete="off" required placeholder="Mevcut Parola">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Yeni Parola</label>
                        <div class="input-group input-group-sm">
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required placeholder="Yeni Parola">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password">Yeni Parola Tekrar</label>
                        <div class="input-group input-group-sm">
                            <input type="password" class="form-control" name="password_again" autocomplete="off" required placeholder="Yeni Parola Tekrar">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-danger float-right">Güncelle</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script src="{{asset('assets/spanel/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/spanel/plugins/jquery-validation/localization/messages_tr.min.js')}}"></script>
    <script>
        $().ready(function() {
            $("form.required").validate({
                rules: {
                    password: {
                        required: true,
                        maxlength: 10,
                        minlength: 1
                    },
                    password: "required",
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
