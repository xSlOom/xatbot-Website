<div class="topbar-main">
    <div class="container">

        <div class="logo">
            <a href="{{ route('panel') }}" class="logo"><i class="md md-laptop"></i> <span>{{ env('NAME') }}</span> </a>
        </div>

        @inject('topbar', 'OceanProject\Http\Controllers\Page\TopbarController')
        @php
        $bots = $topbar->getBots();
        $languages = $topbar->getLanguages();
        @endphp

        @if (count($bots) > 0)
        <ul class="nav navbar-nav">
            <li class="dropdown m-l-10">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">{{ Auth::user()->language->name }}<span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                @foreach ($languages as $language)
                    @if ($language->id != Auth::user()->language_id)
                        <li><a href="#">{{ $language->name }}</a></li>
                    @endif
                @endforeach
                </ul>
            </li>
            <li class="dropdown m-l-10">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">{{ env('BOTID_NAME') }} {{ Session::get('onBotEdit') }}<span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                @foreach ($bots as $botid)
                    @if ($botid != Session::get('onBotEdit'))
                        <li><a href="{{ route('bot.setbotid', ['botid' => $botid]) }}">{{ env('BOTID_NAME') }} {{ $botid }}</a></li>
                    @endif
                @endforeach
                </ul>
            </li>
        </ul>
        @endif

        <div class="menu-extras">
            <ul class="nav navbar-nav navbar-right pull-right">
                <li><a href="{{ route('profile') }}"><i class="ti-user m-r-5"></i> Profile</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ Auth::user()->avatar }}" alt="user-img" class="img-circle"> </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off m-r-5"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="menu-item">
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>