<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin') }}" class="nav-link">{{ trans('custom.home') }}</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ Auth::user()->avatar == '' ? asset('images/defaultuser.jpeg') : asset('images/avatars/' . Auth::user()->avatar) }}" class="user-image img-circle elevation-2 avatar-header" alt="User profile picture">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User profile picture -->
                <li class="user-header bg-primary">
                    <img src="{{ Auth::user()->avatar == '' ? asset('images/defaultuser.jpeg') : asset('images/avatars/' . Auth::user()->avatar) }}" class="img-circle elevation-2" alt="User profile picture">
                    <p>
                        {{ ucwords(Auth::user()->name) }}
                        <small>{{ trans('custom.member_since') }} {{ Auth::user()->created_at->diffForHumans() }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('admin.my_profile') }}" class="btn btn-default btn-flat">{{ trans('custom.my_profile') }}</a>
                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ trans('custom.logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>