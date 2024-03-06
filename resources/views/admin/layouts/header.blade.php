<!-- Header -->
<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <span class="page-title">dashboard</span>

        <div class="navbar-right ">

            <ul class="nav navbar-nav">
                <!-- Offcanvas -->

                {{-- @php
                    $id = Auth::user()->id;
                    $profileData = App\Models\User::findOrFail($id);
                @endphp --}}
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <img src="{{ !empty($profileData->image) ? asset($profileData->image) : url('no-admin-image.png') }}"
                            class="user-image rounded-circle" alt="User Image" />
                        {{-- <span class="d-none d-lg-inline-block">{{ $profileData->name }}</span> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            {{-- <a class="dropdown-link-item" href="{{ route('profile') }}"> --}}
                                <i class="mdi mdi-account-outline"></i>
                                <span class="nav-text">My Profile</span>
                            </a>
                        </li>
                        <li class="dropdown-footer">
                            <a class="dropdown-link-item"
                                onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();"
                                href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i>
                                <span class="nav-text">Logout</span>
                            </a>
                            <form action="{{ route('logout') }}" id="adminLogoutForm" method="POST">
                                @csrf</form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


</header>
