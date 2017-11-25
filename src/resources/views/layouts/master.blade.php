<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/sweetalert/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/pnotify/css/pnotify.custom.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/spanel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/hamburger-icon/style.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('spanel.panelName', 'Laravel') }}</title>
    @yield('css')
</head>
<body>

<div id="wrap" class="menu-active">
    <!-- Header Başlar -->
    @include('spanel::layouts.header')
    <!-- Header Biter -->
    <!-- Sidebar Başlar -->
    @include('spanel::layouts.sidebar')
    <!-- Sidebar Biter -->
    <div class="content">
        <div class="container-fluid">
            <!-- Bread başlar -->
            @include('spanel::layouts.bread')
            <!-- Bread biter -->
            @yield('content')
            <div class="clearfix"></div>
        </div><!-- container-fluid biter -->
    </div><!-- content biter -->
</div><!-- wrap biter -->
<script src="{{asset('assets/spanel/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/popper.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/spanel/plugins/scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/spanel/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/spanel/plugins/pnotify/js/pnotify.custom.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/spanel.js')}}"></script>
<script>
    $(document).ready(function () {
        @if($errors->count())
            @foreach($errors->all() as $error)
                new PNotify({
                    title: 'Hata',
                    text: '{!!$error!!}',
                    type: 'error',
                    icon: false
                });
            @endforeach
        @endif
        @if(Session::has('message'))
            @if(Session::get("script")=='pnotify')
                new PNotify({
                    title: '{!! Session::get("title") !!}',
                    text: '{!! Session::get("text") !!}',
                    type: '{!! Session::get("type") !!}',
                    icon: false,
                    styling: 'fontawesome'
                });
            @else
                swal({
                    title: '{!! Session::get("title") !!}',
                    text: '{!! Session::get("text") !!}',
                    type: '{!! Session::get("type") !!}',
                });
            @endif
        @endif
    });
</script>
@yield('js')
</body>
</html>