<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=BASE_URL ?>" class="nav-link">Website SHOP STP</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item" style="  width: 40px; height: 40px; display: flex;  align-items: center; justify-content: center; border-radius: 50%; background: #f8f9fa; color: #333; transition: 0.3s;">
    <a class="nav-link" href="<?= BASE_URL_ADMIN . '?act=logout-admin' ?>" style="color: inherit; display: flex; align-items: center; justify-content: center;" onclick="return confirm('Bạn có muốn đăng xuất tài khoản?')">
        <i class="fas fa-sign-out-alt"></i>
    </a>
</li>

    </ul>
  </nav>