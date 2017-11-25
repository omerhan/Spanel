<div class="header container-fluid">
    <div class="header-logo-active">
        <div class="logo float-left">
            <a href="#">{{config('spanel.menuHeader')}}</a>
        </div>
        <div class="outline float-right">
            <button class="c-hamburger c-hamburger--htla is-active mobile">
                <span>Menü</span>
            </button>
        </div>
    </div><!-- Header Logo -->
    <div class="header-nav">
        @if(config('spanel.multipleLang')==true)
        <li class="dropdown lang-menu float-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-language"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <h6 class="dropdown-header">Diller</h6>

                @foreach($menulangs as $menulang)
                <a class="dropdown-item @if($menulang->kisaltma == App::getLocale()) active @endif" href="{{url('spanel/langs/setLocale/'.$menulang->kisaltma.'')}}"><img src="{{asset($menulang->bayrak)}}" alt="{!! $menulang->dil !!}" height="23"></a>
                @endforeach

            </div>
        </li>
        @endif
        <li class="dropdown message-menu float-right">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-envelope"></i> <span class="badge badge-danger">10</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <h6 class="dropdown-header">Mesajlar</h6>

                <div class="MessageScroll" style="position: relative; overflow-y: scroll; width: auto; height: 235px;">
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