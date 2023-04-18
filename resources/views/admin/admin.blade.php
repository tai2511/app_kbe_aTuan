@extends('layouts.app')
@section('css_file')
    <link rel="stylesheet" href="{{  asset("assets/css/admin/style.css") }}">
@endsection
@section('js')
    <script src="{{  asset("assets/js/admin/admin.js") }}"></script>
@endsection
@section('sidebar')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="navbar-header pb-4">
                            <a class="nav-link" href="{{ route('frontend') }}">
                                <img src="{{  asset("assets/img/logo-1-1.png") }}" width="121px" alt="Awesome Image" class="default-logo">
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="d-flex align-items-center posts">
                                <i class="icon-fontello icon-wpforms"></i>
                                <a class="nav-link font-weight-bold">
                                    Posts
                                </a>
                            </div>
                            <div class="sub_menu">
                                <a class="dropdown-item" href="{{ route('post.index') }}">All Posts</a>
                                <a class="dropdown-item" href="{{ route('post.create') }}">Add Post</a>
                            </div>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <i class="icon-fontello icon-cog"></i>
                            <a class="nav-link font-weight-bold" href="{{ route('setting.index') }}">
                                Setting
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <div class="col-md-9 col-lg-10 content_admin">
                <header class="pr-3 pl-3 d-flex align-items-center">
                    <div class="toggle-admin-menu"><i class="icon-menu"></i></div>
                    <div class="d-flex align-items-center header ml-auto">
                        <i class="pl-4">Rebaudo</i>
                        <div class="user-img" style="background-image: url(' {{  asset("assets/img/logo-icon.png") }}')"></div>
                    </div>
                </header>
                <div class="p-md-5 p-2">
                    @yield('content_admin')
                </div>
            </div>
        </div>
    </div>
@endsection
