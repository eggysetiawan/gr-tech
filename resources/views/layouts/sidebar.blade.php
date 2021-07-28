<aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('login') }}" class="brand-link">
        <img src="{{ asset('logo.png') }}" alt="GR Tech Logo" class="brand-image img-fluid"
            style="opacity: .8:object-fit: fill;">
        <span class="brand-text font-weight-light">&nbsp;</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->email }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link{{ request()->is('home') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('companies.index') }}"
                        class="nav-link{{ request()->is('companies') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Companies
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('employees.index') }}"
                        class="nav-link{{ request()->is('employees') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
