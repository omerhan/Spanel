@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item"><a href="{{url('spanel/langs')}}">Dil İşlemleri</a></li>
    <li class="breadcrumb-item active">Dil Güncelle</li>
@endsection
@section('content')
    <div class="col-md-12 bg-white">
        <form class="required" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/spanel/langs/trans/'. $lang->id) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap">
                        @foreach($dosya as $key => $value)
                        <div class="form-group form-group-sm row">
                            <label for="{{$key}}" class="col-sm-2 col-form-label">{{$key}}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="{{$key}}" required value="{{$value}}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- <a href="#" id="elementekle" class="btn btn-sm btn-info"><i class="fa fa-plus"></i>Yeni Element Ekle</a> -->
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
@endsection
