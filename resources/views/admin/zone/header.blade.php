<header class="main-header">
    <a href="{{ getCurrentURL('locale').'/Admin' }}" class="logo">
        <span class="logo-mini"><b>118fd</b></span>
        <span class="logo-lg"><b>118</b>food</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('images/users/'. (Auth::User()->info()['img'] ? Auth::User()->info()['img'] : 'default.png')) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">@if (Auth::user()->info()['name']) {{ Auth::user()->info()['name'] . ' ' . @Auth::user()->info()['family'] }} @else {{ Auth::user()->info()['username'] }} @endif</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('images/users/'. (Auth::User()->info()['img'] ? Auth::User()->info()['img'] : 'default.png')) }}" class="img-circle" alt="User Image">
                            <p>
                                @if (Auth::user()->info()['name']) {{ Auth::user()->info()['name'] . ' ' . Auth::user()->info()['family'] }} @else {{ Auth::user()->info()['username'] }} @endif
                            </p>
                            <p class="small-font">{{ trans('public.' . Auth::user()->role()) }}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ url('user/'.\Illuminate\Support\Facades\Auth::user()->info()['username'].'/Setting') }}" class="btn btn-default btn-flat">{{ trans('user.Profile') }}</a>
                            </div>
                            <div class="pull-left">
                                <a href="{{ getCurrentURL('locale').'/Auth/logout' }}" class="btn btn-default btn-flat">{{ trans('user.Sign Out') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>