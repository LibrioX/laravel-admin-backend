<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">AP</a>
        </div>
        <ul class="sidebar-menu">

            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('pages.dashboard') }}">General Dashboard</a>
                    </li>

                </ul>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>

                </ul>
            </li>

        </ul>
    </aside>
</div>
