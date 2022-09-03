<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('admin.dashboard')}}" class="brand-link elevation-4">
          <img src="{{asset('dashboard')}}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            @include('dashboard.layouts._parts.sidebar_user')


          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              
              <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    
                  </p>
                </a>
              </li>
               <li class="nav-header">Auth</li>
              <li class="nav-item menu-closed">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Members
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="../layout/top-nav.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Top Navigation</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../layout/top-nav-sidebar.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Top Navigation + Sidebar</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-header">Station</li>
              <li class="nav-item">
                <a href="{{route('shows.index')}}" class="nav-link @yield('active_module_shows')">
                  <i class="nav-icon fas fa-music"></i>
                  <p>
                    Shows
                    
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('schedules.index')}}" class="nav-link @yield('active_module_schedules')">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Schedules
                    
                  </p>
                </a>
              </li>
              
              <li class="nav-header">EXAMPLES</li>
              
             
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
