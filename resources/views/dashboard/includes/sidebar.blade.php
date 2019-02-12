<aside class="main-sidebar elevation-4 sidebar-light-primary" style="min-height: 610px;">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard.home.index') }}" class="brand-link text-center">
          <span class="brand-text font-weight-bold">Jobs Portal</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            <img src="{{ asset('img/user-avatar/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item">
                <a href="{{ route('dashboard.home.index') }}" class="nav-link">
                  <i class="nav-icon fa fa-home"></i>
                  <p>Home</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{ route('categories') }}" class="nav-link">
                    <i class="nav-icon fa fa-cube"></i>
                    <p>Categories</p>
                  </a>
              </li>

                <li class="nav-item">
                    <a href="{{ route('companies') }}" class="nav-link">
                      <i class="nav-icon fa fa-building"></i>
                      <p>Compaines</p>
                    </a>
                </li>

                  <li class="nav-item">
                      <a href="{{ route('locations') }}" class="nav-link">
                        <i class="nav-icon fa fa-compass"></i>
                        <p>Locations</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('types') }}" class="nav-link">
                        <i class="nav-icon fa fa-asterisk"></i>
                        <p>Types</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('jobs') }}" class="nav-link">
                        <i class="nav-icon fa fa-puzzle-piece"></i>
                        <p>Jobs</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('users') }}" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Administrators</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('profile') }}" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>My Profile</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
            </ul>
          </nav>
        </div>
      </aside>
