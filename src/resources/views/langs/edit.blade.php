@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item"><a href="{{url('spanel/users')}}">Dil İşlemleri</a></li>
    <li class="breadcrumb-item active">Dil Güncelle</li>
@endsection
@section('content')
    <div class="col-md-12 bg-white">
        <form class="required" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/spanel/langs/'. $lang->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-4 pt50">
                    <div class="form-group mt20">
                        <div class="fileinput fileinput-exists d-block" data-provides="fileinput">
                            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: auto; height: auto;">
                                    <img src="{{asset($lang->bayrak)}}" class="img-fluid mx-auto d-flex" alt="{{ $lang->name }}">
                            </div>
                            <div class="fileinputbtn">
                                <a href="#" class="btn fileinput-exists btn-sm btn-danger float-right ml10" data-dismiss="fileinput">Sil</a>
                                <div class="btn-file float-right">
                                    <span class="fileinput-new btn-sm btn btn-success">Resim Seç</span>
                                    <span class="fileinput-exists btn btn-sm btn-info">Değiştir</span>
                                    <input type="file" name="bayrak">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Dil Adı" value="{{$lang->dil}}" required name="dil">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Dil Kısaltma" value="{{$lang->kisaltma}}" required name="kisaltma">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Dil Site Title" value="{{$lang->title}}" required name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Dil Site Description" value="{{$lang->desc}}" required name="desc">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Dil Site Keywords" value="{{$lang->keyw}}" required name="keyw">
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
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });
        });
    </script>
@endsection
