<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
{{--         <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
        <title>Quản lý quán cafe</title>
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/simple-datatables/style.css') }}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/chartjs/Chart.min.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('dashboard/assets/css/app.css')}}">
        <link rel="stylesheet" href="{{ asset('dashboard/font-awesome/css/font-awesome.min.css') }}">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Include Choices CSS -->
        <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.svg')}}" type="image/x-icon">
        @stack('scripts')
       
        @toastr_css
    </head>
    <style type="text/css">
        *{
            font-family: sans-serif!important;
        }
    </style>
    <body>
        <div id="app">
            <div id="sidebar" class='active'>
                <div class="sidebar-wrapper active no-print">
                    <div class="sidebar-header">
                        <img src="{{asset ('dashboard/assets/images/logo.svg')}}" alt="" srcset="">
                    </div>
                    <div class="sidebar-menu">
                        <ul class="menu">
                            <li class='sidebar-title'>Main Menu</li>
                            <li class="sidebar-item active ">
                                <a href="{{route('home')}}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i> 
                                <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="coffee" width="20"></i> 
                                    <span>Quản lý bán hàng</span>
                                </a>
                                
                                <ul class="submenu ">
                                    <li>
                                        <a href="{{ route('get.billofsale') }}">Lập hóa đơn bán hàng</a>
                                    </li>

                                    <li>
                                        <a href="{{route('get.servedinks')}}">Phục vụ đồ uống</a>
                                    </li>
                                </ul>
                                
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="truck" width="20"></i> 
                                    <span>Quản lý hàng hóa</span>
                                </a>
                                
                                <ul class="submenu ">
                                    <li>
                                        <a href="{{ route('get.goodDeliveryNote') }}">Quản lý phiếu nhập kho</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('get.matterial') }}">Quản lý danh mục hàng hóa</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('get.supplier') }}">Quản lý danh mục nhà cung cấp</a>
                                    </li>
                                </ul>
                                
                            </li>

                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="home" width="20"></i> 
                                    <span>Quản lý cửa hàng</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="{{ route('get.menu') }}">Quản lý thực đơn</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ route('get.users') }}">Quản lý nhân viên</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('get.table') }}">Quản lý bàn</a>
                                    </li>
                                </ul>
                                
                            </li>
                        </ul>
                    </div>
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
            </div>
            <div id="main">
                <nav class="navbar navbar-header navbar-expand navbar-light no-print">
                    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                    <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="avatar mr-1">
                                        <img src="{{asset ('dashboard/assets/images/avatar/avatar-s-1.png') }}" alt="" srcset="">
                                    </div>
                                    @if(Auth::check())
                                        <div class="d-none d-md-block d-lg-inline-block">{{Auth::user()->name}}</div>
                                     @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    {{-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                    <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a> --}}
                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item" href="{{route('get.logout')}}"><i data-feather="log-out"></i> Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="main-content container-fluid">
                    <section class="section">
                        @yield('content')
                    </section>
                </div>
                <footer  class="no-print">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-left">
                            <p>2020 &copy; Trần Việt Tiến</p>
                        </div>
                </footer>
            </div>
        </div>
        <script src="{{asset ('dashboard/assets/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{asset ('dashboard/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{asset ('dashboard/assets/js/app.js') }}"></script>
        <script src="{{asset ('dashboard/assets/vendors/chartjs/Chart.min.js') }}"></script>
        <script src="{{asset ('dashboard/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{asset ('dashboard/assets/js/pages/dashboard.js') }}"></script>
        <script src="{{asset ('dashboard/assets/js/main.js') }}"></script>
        <script src="{{asset ('dashboard/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{asset ('dashboard/assets/js/vendors.js') }}"></script>
        
        <!-- Validate Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        @toastr_js
        @toastr_render

        
    </body>
</html>