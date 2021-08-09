<header class="header_sticky">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo_home">
                    <h1><a href="{{ url('/') }}" title="Findoctor">Findoctor</a></h1>
                </div>
            </div>
            <nav class="col-lg-9 col-6">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
                <ul id="top_access">
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}"><i class="pe-7s-user"></i></a></li>
                    @else
                        <li><a href="{{ url('/logout') }}"><i class="pe-7s-power"></i></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</header>

