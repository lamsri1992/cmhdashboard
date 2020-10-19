<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend')) ? 'active' : '' }}"
                    href="/backend">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/menu*')) ? 'active' : '' }}"
                    href="/backend/menu">
                    <i class="fa fa-sitemap"></i> Dashboard Group
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/report*')) ? 'active' : '' }}"
                    href="/backend/report">
                    <i class="fa fa-chart-pie"></i> Dashboard List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('backend/table*')) ? 'active' : '' }}"
                    href="/backend/table">
                    <i class="fa fa-table"></i> Dataset Report
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-user-cog"></i> User Management
                </a>
            </li>
        </ul>
    </div>
</nav>
