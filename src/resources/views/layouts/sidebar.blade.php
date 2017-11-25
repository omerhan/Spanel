<div class="sidebar">
    <div class="profil">
        @if(Auth::user()->avatar=='')
            <img src="{{asset('assets\spanel\img\no-avatar.png')}}" class="rounded-circle float-left mr5" alt="{{ Auth::user()->name }}">
        @else
            <img src="{{asset(Auth::user()->avatar)}}" class="img-thumbnail float-left mr5" alt="{{ Auth::user()->name }}">
        @endif
        <div class="mt5">{{ Auth::user()->name }}</div>
        {{ Auth::user()->email }}
        <div class="clearfix"></div>
        <a href="{{url('spanel/password')}}" class="parola  @if(Request::segment(2)=='password') active @endif" data-toggle="tooltip" data-placement="left" title="Parola Güncelle"><i class="fa fa-key"></i></a>
        <a href="{{route('profile')}}" class="profil-bilgileri @if(Request::segment(2)=='profile') active @endif" data-toggle="tooltip" data-placement="left" title="Kullanıcı Bilgileri"><i class="fa fa-user"></i></a>
    </div>
    <div class="sidebar-menu">
        <ul id="nav">
            <li @if(Request::segment(1)=='spanel' && Request::segment(2)=='') class="active" @endif><a href="{{route('spanel')}}"><i class="fa fa-home"></i> Spanel</a></li>
            <li @if(Request::segment(2)=='users') class="active" @endif><a href="{{url('spanel/users')}}"><i class="fa fa-users"></i> Kullanıcı İşlemleri</a></li>
            @if(config('spanel.multipleLang')==true)
                <li @if(Request::segment(2)=='langs') class="active" @endif><a href="{{url('spanel/langs')}}"><i class="fa fa-language"></i> Dil İşlemleri</a></li>
            @endif
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