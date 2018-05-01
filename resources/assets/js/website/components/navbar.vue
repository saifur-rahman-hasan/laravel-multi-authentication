<template>

    <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
        <div class="container">

            <div class="navbar-header">

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/logo_light.png') }}" alt="">
                </a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                    <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>

            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">

                @auth
                <ul class="nav navbar-nav">
                    <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
                            <span>{{ Auth::user()->name }}</span>
                            <i class="caret"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                            <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                            <li><a href="#"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>

                            <!-- Admin Logout Link -->
                            <li>
                                <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="icon-switch2"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </li>
                </ul>
                @endauth

                @guest
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('login') }}">{{ __('Explore Services') }}</a></li>
                    <li><a href="{{ route('login') }}">{{ __('Task Center') }}</a></li>
                    <li><a href="{{ route('login') }}">{{ __('Join as Service Provider') }}</a></li>
                    <li><a href="{{ route('login') }}">{{ __('Join as Customer') }}</a></li>
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>

                    <!-- Language Switch -->
                    <li class="dropdown language-switch">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/flags/us.png') }}" class="position-left" alt="">
                            English (US)
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="deutsch"><img src="{{ asset('assets/images/flags/us.png') }}" alt=""> English (US)</a></li>
                            <li><a class="deutsch"><img src="{{ asset('assets/images/flags/hk.png') }}" alt=""> Hong Kong</a></li>
                        </ul>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        name: 'navbar',

        props: [ '' ]

    }
</script>