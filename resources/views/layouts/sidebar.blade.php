<!-- Main Sidebar Container -->
<aside class="main-sidebar d-block sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/' . Auth::user()->image) }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ Route('dashboard') }}"
                        class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                <li class="nav-item">
                    <a href="{{ Route('user.index') }}"
                        class="nav-link {{ Route::currentRouteName() == 'user.index' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </li>
            </ul>






            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
