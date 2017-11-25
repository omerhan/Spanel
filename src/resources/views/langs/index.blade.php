@extends('spanel::layouts.master')
@section('bread')
    <li class="breadcrumb-item active">Dil İşlemleri</li>
@endsection


@section('content')
    <div class="col-md-12 bg-white pt25">
        @if(config('spanel.multipleLangCount') > $langs->count())
            <a href="#"  data-toggle="modal" data-target="#kullaniciekle" class="btn btn-info btn-sm mb20 float-left"><i class="fa fa-user-plus mr10"></i>Dil Ekle</a>
            <div class="text-danger mt5 ml15 float-left">Kalan izin verilen dil sayısı <strong>{{ config('spanel.multipleLangCount') - $langs->count() }}</strong></div>
        @endif
        <table class="table table-striped table-hover table-responsive text-center">
            <thead>
            <tr>
                <th class="text-center">Bayrak</th>
                <th class="text-center">Dil</th>
                <th class="text-center">Kısaltma</th>
                <th class="text-center">Dönüşüm</th>
                @if($langs->count()>1)<th class="text-center">Aktif</th>@endif
                <th class="text-center">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($langs as $lang)
                <tr id="trsil{{$lang->id}}" @if($lang->kisaltma == App::getLocale()) class="table-info" @endif>
                    <td class="align-middle">
                        @if($lang->bayrak=='')
                            <i class="fa fa-2x fa-language"></i>
                        @else
                            <img src="{!! asset($lang->bayrak) !!}" alt="{!! $lang->dil !!}" height="30">
                        @endif
                    </td>
                    <td class="align-middle">{!! $lang->dil !!}</td>
                    <td class="align-middle">{!! $lang->kisaltma !!}</td>
                    <td class="align-middle" style="width: 50px;">
                        <a href="{{url('spanel/langs/trans/'.$lang->id.'')}}" class="btn btn-sm btn-warning"><i class="fa fa-language"></i></a>
                    </td>
                    @if($langs->count()>1)
                    <td class="align-middle">
                        <input type="checkbox" datatype="{!! $lang->id !!}" id="check{!! $lang->id !!}" name="active" {{ $lang->active ? 'checked' : '' }} class="js-switch">
                    </td>
                    @endif
                    <td class="align-middle" style="width: 85px;">
                        @if($lang->kisaltma!='tr')
                            <a href="{{url('spanel/langs/'.$lang->id.'/edit')}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                            <a href="#" datatype="{!! $lang->id !!}" class="btn btn-sm btn-danger sil"><i class="fa fa-remove"></i></a>
                        @else
                            <a href="#" class="btn btn-danger btn-sm">Default</a>
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
                <form class="required" action="langs" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Dil Ekle</h5>
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
                                            <img src="{{asset('assets/spanel/img/tr.png')}}" class="img-fluid mx-auto d-flex" alt="Bayrak seçiniz">
                                        </div>
                                        <div class="fileinputbtn">
                                            <a href="#" class="btn fileinput-exists btn-sm btn-danger float-right ml10" data-dismiss="fileinput">Sil</a>
                                            <div class="btn-file float-right">
                                                <span class="fileinput-new btn-sm btn btn-success">Resim Seç</span>
                                                <span class="fileinput-exists btn btn-sm btn-info">Değiştir</span>
                                                <input type="file" required name="bayrak">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Dil Adı" required name="dil">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Dil Kısaltma" required name="kisaltma">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Dil Site Title" required name="title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Dil Site Description" required name="desc">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Dil Site Keywords" required name="keyw">
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
                errorPlacement: function (error, element) {
                    error.insertAfter(element.parent());
                }
            });

        });

        $('.sil').click(function () {
            var sildeger = $(this).attr('datatype');
            swal({
                    title: "Eminmisiniz?",
                    text: "Dili sistemden silmek istediğinize eminmisiniz?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Sil!",
                    cancelButtonText: "Vazgeç",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        type: "DELETE",
                        url: 'langs/'+sildeger+'',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        success: function (data) {
                            $('#trsil'+sildeger+'').remove();
                            swal("Silindi!", "Dil başarıyla silindi.", "success");
                            location.reload(true);
                        },
                        error: function (data) {
                            swal("Başarısız", "Dil Silinemedi.", "error");
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
                url: 'langs/active/'+check+'/'+changeCheckbox.checked+'',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data) {
                    swal("Başarılı", "Dil başarıyla "+data.message+".", data.type);
                },
                error: function (data) {
                    swal("Başarısız", "İşlem yaparken bir hata oluştu.", "warning");
                }
            });

            //alert(changeCheckbox.checked);
        });

    </script>
@endsection
