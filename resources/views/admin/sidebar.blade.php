<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        @php
            $currentRouteName = Route::currentRouteName();
        @endphp
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item {{ strpos($currentRouteName,'admin.category') !== false ? 'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Danh mục
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{ route('admin.category.add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item {{ strpos($currentRouteName,'admin.product') !== false ? 'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Sản phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{ route('admin.product.add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item {{ strpos($currentRouteName,'admin.post') !== false ? 'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.post.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
             <li class="nav-item">
                <a href="{{ route('admin.post.add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm mới</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-item {{ strpos($currentRouteName,'admin.order') !== false ? 'menu-is-opening menu-open':'' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Đơn đặt hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.category.list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden os-scrollbar-unusable"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
