<div>
    <!-- Sidebar outter -->
    <div class="main-sidebar sidebar-style-2">
        <!-- sidebar wrapper -->
        <aside id="sidebar-wrapper">
            <!-- sidebar brand -->
            <div class="sidebar-brand">
                <a href="{{ route('welcome') }}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <!-- sidebar menu -->
            <ul class="sidebar-menu">
                <!-- menu header -->
                <li class="menu-header">General</li>
                <!-- menu item -->
                <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-fire"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ Route::is('profile') ? 'active' : '' }}">
                    <a href="{{ route('profile') }}">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="{{ Route::is('employees.index') ? 'active' : '' }}">
                    <a href="{{ route('employees.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li class="{{ Route::is('payslips.index') ? 'active' : '' }}">
                    <a href="{{ route('payslips.index') }}">
                        <i class="fas fa-file-invoice"></i>
                        <span>Pay Slips</span>
                    </a>
                </li>
                <li class="{{ Route::is('mailbroadcasts.index') ? 'active' : '' }}">
                    <a href="{{ route('mailbroadcasts.index') }}">
                        <i class="fas fa-mail-bulk"></i>
                        <span>Broadcast</span>
                    </a>
                </li>
            </ul>
        </aside>
    </div>
</div>