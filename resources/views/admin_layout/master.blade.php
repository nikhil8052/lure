
<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Lure">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('admin/images/lure_logo.svg') }}">
    <!-- Page Title  -->
    <title>Admin Dashboard</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.2') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.2') }}">

    {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <!-- jquery cnd links  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    {{-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    {{-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css"> --}}

    <style>
        #loading-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background-color: #000;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
        }
        .ck-editor__editable_inline {
            min-height: 150px; 
        }
    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div id="loading-screen" >
        <div id="logo-container">
            <div class="GIF_LOGO" id="display">
                <img src="{{ asset('admin/images/gif_logo.gif') }}" alt="Lure">
            </div>
        </div>
    </div>
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('admin/images/lure_logo.svg') }}"  alt="logo">
                        </a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Dashboard</h6>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="{{ route('web.results') }}" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Web Content</span>
                                    </a>
                                    <ul class="nk-menu-sub" >
                                        <li class="nk-menu-item">
                                            <a href="{{ route('web.models') }}" class="nk-menu-link"><span class="nk-menu-text">Models</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('web.services') }}" class="nk-menu-link"><span class="nk-menu-text">Services</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('web.results') }}" class="nk-menu-link"><span class="nk-menu-text">Our Results</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('influence.content') }}" class="nk-menu-link"><span class="nk-menu-text">Expand Influence</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="{{ route('web.home.page') }}" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-files"></em></span>
                                        <span class="nk-menu-text">Web Pages</span>
                                    </a>
                                    <ul class="nk-menu-sub" >
                                        <li class="nk-menu-item">
                                            <a href="{{ route('web.home.page') }}" class="nk-menu-link"><span class="nk-menu-text">Home Page</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{{ route('web.applyNow.page') }}" class="nk-menu-link"><span class="nk-menu-text">Apply Now Page</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nk-menu-item active current-page">
                                    <a href="{{ route('website.testimonials') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Testimonials</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item active current-page">
                                    <a href="{{ route('website.Faqs') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Faqs</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item active current-page">
                                    <a href="{{ route('website.settings') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting-alt-fill"></em></span>
                                        <span class="nk-menu-text">Settings</span>
                                    </a>
                                </li>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Account</h6>
                                </li>
                                <li class="nk-menu-item active current-page">
                                    <a href="{{ route('admin.profile') }}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-account-setting-fill"></em></span>
                                        <span class="nk-menu-text">Account Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="{{ route('admin.dashboard') }}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('admin/images/lure_logo.svg') }}"  alt="logo">
                                </a>
                            </div><!-- .nk-header-brand -->
                        
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    @if(isset(auth()->user()->profile_photo) && auth()->user()->profile_photo != null)
                                                        <span><img  src="{{ asset('admin/images') }}/{{ auth()->user()->profile_photo }}"  alt="logo"></span>
                                                    @else
                                                        <em class="icon ni ni-user-alt"></em>
                                                    @endif
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">Admin</div>
                                                    <div class="user-name dropdown-indicator">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        @if(isset(auth()->user()->profile_photo) && auth()->user()->profile_photo != null)
                                                            <span><img  src="{{ asset('admin/images') }}/{{ auth()->user()->profile_photo }}"  alt="logo"></span>
                                                        @else
                                                            <span>{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->last_name, 0, 1)) }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ auth()->user()->first_name }} {{ auth()->user()->last_name ?? ''}}</span>
                                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('admin.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    {{-- <li><a href="html/user-profile-setting.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li> --}}
                                                    {{-- <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li> --}}
                                                    <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('logout') }}"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    {{-- <li class="dropdown notification-dropdown me-n1">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="#">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">You have requested to <span>Widthdrawl</span></div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                    <div class="nk-notification-item dropdown-inner">
                                                        <div class="nk-notification-icon">
                                                            <em class="icon icon-circle bg-success-dim ni ni-curve-down-left"></em>
                                                        </div>
                                                        <div class="nk-notification-content">
                                                            <div class="nk-notification-text">Your <span>Deposit Order</span> is placed</div>
                                                            <div class="nk-notification-time">2 hrs ago</div>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown --> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                @yield('content')
                
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright"> &copy; 2024 Lure. All Rights Reserved.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/bundle.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.js?ver=3.1.2') }}"></script>
    <script src="{{ asset('admin/assets/js/charts/gd-default.js?ver=3.1.2') }}"></script>
    <script>
        $(window).on('load',function() {
            setTimeout(function() {
                $('#loading-screen').fadeOut();
            }, 2000); 
        });
    </script>
    @if (Session::get('error'))
        <script>
            toastr.clear();
            NioApp.Toast('{{ Session::get('error') }}', 'error', {
                position: 'top-right'
            });
        </script>
    @endif
    @if (Session::get('success'))
        <script>
            toastr.clear();
            NioApp.Toast('{{ Session::get('success') }}', 'success', {
                position: 'top-right'
            });
        </script>
    @endif
</body>
</html>