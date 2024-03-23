<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="">
                {{-- <img src="{{ asset('assets/images/loader.jpg') }}" width="50px"> --}}
                <span class="brand-name" style="font-size: 17px">Affiliation Points</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="">
                    <a class="sidenav-item-link" href="{{ url('admin/dashboard') }}">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
           
                
              
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('user_admin.index') }}">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="nav-text">Users</span>
                    </a>
                </li>
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('category_admin.index') }}">
                        <i class="mdi mdi-folder"></i>
                        <span class="nav-text">Categories</span>
                    </a>
                </li>
                
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('branch_admin.index') }}">
                        <i class="mdi mdi-source-branch"></i>
                        <span class="nav-text">Branch</span>
                    </a>
                </li>
                <li class="">
                    <a class="sidenav-item-link" href="{{ route('employee_admin.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Employees</span>
                    </a>
                </li>
                
             
            </ul>
        </div>
    </div>
</aside>
