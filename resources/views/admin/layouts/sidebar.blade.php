<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="">
                <img src="{{ asset('assets/images/loader.jpg') }}" width="50px">
                <span class="brand-name" style="font-size: 17px">Ramtha Municipality</span>
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
              
              
               
               
             
            </ul>
        </div>
    </div>
</aside>