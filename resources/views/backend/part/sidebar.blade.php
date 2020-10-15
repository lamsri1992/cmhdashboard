<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{(request()->is('backend')) ? 'active' : ''}}" href="/backend">
            <i class="fa fa-home"></i> หน้าแรก
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{(request()->is('backend/menu*')) ? 'active' : ''}}" href="/backend/menu">
            <i class="fa fa-sitemap"></i> จัดการเมนูระบบ
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{(request()->is('backend/report*')) ? 'active' : ''}}" href="/backend/report">
            <i class="fa fa-chart-pie"></i> จัดการ Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{(request()->is('backend/table*')) ? 'active' : ''}}" href="/backend/table">
            <i class="fa fa-tasks"></i> จัดการรายงาน
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fa fa-user-cog"></i> จัดการผู้ใช้งาน
          </a>
        </li>
      </ul>
    </div>
</nav>