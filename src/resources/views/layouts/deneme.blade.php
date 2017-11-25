<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/css/spanel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/spanel/plugins/hamburger-icon/style.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
<div class="header container-fluid">
    <div class="header-logo-active">
        <div class="logo float-left">
            <a href="#">SPanel</a>
        </div>
        <div class="outline float-right">
            <button class="c-hamburger c-hamburger--htla is-active mobile">
                <span>Left Menü</span>
            </button>
        </div>
    </div><!-- Header Logo -->
    <div class="header-nav">
        <li class="dropdown lang-menu float-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-language"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <h6 class="dropdown-header">Diller</h6>
                <a class="dropdown-item active" href="#"><img src="{{asset('assets\spanel\img\tr.png')}}" alt=""></a>
                <a class="dropdown-item" href="#"><img src="{{asset('assets\spanel\img\ru.png')}}" alt=""></a>
            </div>
        </li>
        <li class="dropdown message-menu float-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i> <span class="badge badge-danger">10</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <h6 class="dropdown-header">Mesajlar</h6>

                <div class="MessageScroll" style="position: relative; overflow-y: scroll; width: auto; height: 240px;">
                    <ul class="no-border notifications-box">
                        <li>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                1 kaç saniye önce
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="notification-text font-blue">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> dakika önce
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 saat</b> sonra :)
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                1 kaç saniye önce
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> dakika önce
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="notification-text font-blue">Alternate notification styling.</span>
                            <div class="notification-time">
                                <b>2 saat</b> sonra
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="dropdown-footer">
                    <a href="#" class="btn btn-sm btn-outline-danger">Tüm Mesajları Gör</a>
                </div>
            </div>
        </li>
    </div><!-- Header Nav -->
</div><!-- Header Sonu -->
<div id="wrap" class="menu-active">
    <div class="sidebar">
        <div class="profil">
            @if(Auth::user()->avatar=='')
                <img src="{{asset('assets\spanel\img\no-avatar.png')}}" class="rounded-circle float-left mr5" alt="{{ Auth::user()->name }}">
            @else
                <img src="{{Auth::user()->avatar}}" alt="{{ Auth::user()->name }}">
            @endif
            <div class="mt5">{{ Auth::user()->name }}</div>
            {{ Auth::user()->email }}
            <div class="clearfix"></div>
            <a href="#" class="parola" data-toggle="tooltip" data-placement="top" title="Parola Güncelle"><i class="fa fa-key"></i></a>
            <a href="#" class="profil-bilgileri" data-toggle="tooltip" data-placement="top" title="Kullanıcı Bilgileri"><i class="fa fa-user"></i></a>
        </div>
        <div class="sidebar-menu">
            <ul id="nav">
                <li class="active"><a href="#"><i class="fa fa-home"></i> Spanel</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
                <li class="collapse-item"> <!-- collapse-active -->
                    <a data-toggle="collapse" data-parent="#nav" aria-expanded="false">
                        <i class="fa fa-file"></i> Sayfalar
                    </a>
                    <ul class="collapse" role="tabpanel">
                        <li><a href="#">1-1</a></li>
                        <li><a href="#">1-2</a></li>
                        <li><a href="#">1-3</a></li>
                    </ul>
                </li>
                <li class="collapse-item">
                    <a data-toggle="collapse" data-parent="#nav" aria-expanded="false">
                        <i class="fa fa-file"></i> Ayarlar
                    </a>
                    <ul class="collapse" role="tabpanel">
                        <li><a href="#">2-1</a></li>
                        <li><a href="#">2-2</a></li>
                        <li><a href="#">2-3</a></li>
                    </ul>
                </li>
                <li class="collapse-item">
                    <a data-toggle="collapse" data-parent="#nav" aria-expanded="false">
                        <i class="fa fa-file"></i> Popup
                    </a>
                    <ul class="collapse" role="tabpanel">
                        <li><a href="#">2-1</a></li>
                        <li><a href="#">2-2</a></li>
                        <li><a href="#">2-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul><!-- Nav Sonu -->
        </div><!-- Sidebar Nav Sonu -->
        <div class="sidebar-footer">
            <img src="{{asset('assets\spanel\img\shift-logo.png')}}" class="img-fluid float-left ml5 mt10" style="height: 28px;" alt="">
            <span class="float-left ml5"><strong>© 2017 SPanel</strong></span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="float-right logout pr10">
                <i class="fa fa-2x fa-power-off"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div><!-- Sidebar Sonu -->
    <div class="content">
        <div class="container-fluid">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('spanel')}}">SPanel</a></li>
                <li class="breadcrumb-item active">Sayfalar</li>
            </ol>



            <div class="row">
                <div class="col-md-9 col-sm-7 col-xs-12 mt10" style="min-height: 600px;">
                    <div class="col-12 bg-white">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Example select</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Example multiple select</label>
                                <select multiple class="form-control" id="exampleFormControlSelect2">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <input class="form-control form-control-lg mb10" type="text" placeholder=".form-control-lg">
                                <input class="form-control mb10" type="text" placeholder="Default input">
                                <input class="form-control form-control-sm mb10" type="text" placeholder=".form-control-sm">
                            </div>

                            <div class="form-group">
                                <select class="form-control form-control-lg mb10">
                                    <option>Large select</option>
                                </select>
                                <select class="form-control mb10">
                                    <option>Default select</option>
                                </select>
                                <select class="form-control form-control-sm mb10">
                                    <option>Small select</option>
                                </select>
                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Option one is this and that&mdash;be sure to include why it's great
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="" disabled>
                                    Option two is disabled
                                </label>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-3 col-sm-5 col-xs-12 mt10" style="min-height: 600px;">
                    <div class="col-12 bg-white">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                    </div>

                    <div class="col-12 bg-white mt15">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                    </div>

                    <div class="col-12 bg-white mt15">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                    </div>


                    <div class="col-12 bg-white mt15">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script src="{{asset('assets/spanel/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/popper.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/spanel/plugins/scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/spanel/js/spanel.js')}}"></script>
</body>
</html>