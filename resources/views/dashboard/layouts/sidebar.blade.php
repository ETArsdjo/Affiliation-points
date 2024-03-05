<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Mono - Responsive Admin & Dashboard Template</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
  <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  
  
  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="css/style.css" />

  <!-- FAVICON -->
  <link href="images/favicon.png" rel="shortcut icon" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="plugins/nprogress/nprogress.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                {{-- <div class="app-brand demo"> --}}
                <center><img src="{{ asset('ETA.png') }}" alt="" width="150px"></center>
                {{-- </div> --}}

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    @if (Route::has('login'))
                        @auth
                            <!-- Dashboard -->

                            @if (auth()->user()->role == 'farmer')
                                <li class="menu-item @if (request()->routeIs('dashboard')) active @endif ">
                                    <a href="/farmerDashboard" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Dashboard</div>
                                    </a>
                                </li>
                                <li class="menu-item @if (request()->routeIs('dashboard')) active @endif ">
                                    <a href="/manageFarmDetailes" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                        <div data-i18n="Analytics">Manage farm</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'volunteer')

                                <li class="menu-item @if (request()->routeIs('dashboard')) active @endif ">
                                    <a href="/admin/adminDashboard" class="menu-link">
                                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                        <div data-i18n="Analytics">Dashboard</div>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['kingdom-admin.*']) }}">
                                    <a href="{{ route('kingdom-admin.index') }}" class="menu-link">
                                        <i class="menu-icon tf-icons bx bxs-crown"></i>
                                        <div data-i18n="Analytics">Kingdom-المملكة</div>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'volunteer')

                                <li class="menu-item">
                                    {{-- <label for="category-dropdown" class="menu-link">
                                    <i class="menu-icon tf-icons bx bxs-group"></i>
                                    <div data-i18n="Analytics">التصنيفات</div>
                                </label> --}}
                                    <select id="category-dropdown" class="dropdown-list menu-link"
                                        onchange="window.location.href=this.value">
                                        <option>التصنيفات</option>

                                        <option value="{{ route('phylum-admin.index') }}"
                                            {{ set_active(['phylum-admin.*']) }}>Phylum-الشعبة</option>
                                        <option value="{{ route('class-admin.index') }}"
                                            {{ set_active(['class-admin.*']) }}>Class-الصف</option>
                                        <option value="{{ route('rank-admin.index') }}"
                                            {{ set_active(['rank-admin.*']) }}>Rank-الرتبة</option>
                                        <option value="{{ route('family-admin.index') }}"
                                            {{ set_active(['family-admin.*']) }}>Family-العائلة</option>
                                        <option value="{{ route('genus-admin.index') }}"
                                            {{ set_active(['genus-admin.*']) }}>Genus-الجنس</option>
                                        <option value="{{ route('types-admin.index') }}"
                                            {{ set_active(['types-admin.*']) }}>types-النوع</option>
                                        <option value="{{ route('species-admin.index') }}"
                                            {{ set_active(['species-admin.*', 'showDetails']) }}>Species-الصنف</option>
                                    </select>
                                </li>

                                <li class="menu-item {{ set_active(['companies-admin.*']) }}">
                                    <a href="{{ route('companies-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">Company-الشركة</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                    <a href="{{ route('user-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">User</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                    <a href="{{ route('pesticides-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">Pesticide-المبيدات</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                    <a href="{{ route('AgricultureTypes-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">agriculture_types-انواع الزراعة</div>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->role == 'admin')
                                <li class="menu-item {{ set_active(['user-admin.*']) }}">
                                    <a href="{{ route('IrrigationTypes-admin.index') }}" class="menu-link">
                                        <i class="menu-icon bx bxs-user"></i>
                                        <div data-i18n="Analytics">irrigation_types-انواع الري</div>
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl  align-items-center bg-navbar-theme"
                    id="layout-navbar">


                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->

                        <!-- /Search -->
                        @if (Route::has('login'))
                            <ul class="navbar-nav flex-row align-items-center ms-auto">


                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    @auth
                                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                            data-bs-toggle="dropdown">
                                            <div class="avatar avatar-online">
                                                <span class="fw-semibold d-block"> {{ auth()->user()->name }}</span>
                                            </div>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 me-3">

                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <span class="fw-semibold d-block">
                                                                {{ auth()->user()->name }}</span>
                                                            <small class="text-muted">Admin</small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bx bx-user me-2"></i>
                                                    <span class="align-middle">My Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="dropdown-divider"></div>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </a>
                                            </li>
                                        @else
                                            <a class="nav-link btn-primary" style="color: white"
                                                href="{{ route('login') }}">Log
                                                in</a>
                                        </ul>
                                    </li>
                            @endif
                            <!--/ User -->
                            </ul>
                        </div>
                        @endif
                    </nav>
