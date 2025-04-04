<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="http://localhost/duan1/admin/" class="brand-link">
      <img src="./assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN SHOP STP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./assets/dist/img/IMG_0879.jpg" class="img-circle elevation-2" alt="User Image">
        </div><br>
        <div class="info">
          <a href="https://www.facebook.com/photo/?fbid=1373410143455212&set=a.203052093824362" class="d-block">DUY SANG</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN  ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              Dashboard
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh mục sản phẩm 
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
            <i class="nav-icon fas fa-tshirt"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Đơn hàng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Quản lý tài khoản
              </p>
            <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link" style="padding-left: 30px;">
                    <i class="nav-icon fas fa-user-lock"></i>
                    <p>
                      Tài khoản admin
                    </p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link" style="padding-left: 30px;">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      Tài khoản client
                    </p>
                    </a>
              </li>
              <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-ca-nhan' ?>" class="nav-link" style="padding-left: 30px;">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                      Tài khoản cá nhân
                    </p>
                    </a>
              </li>
            </ul>
          </li>

        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
