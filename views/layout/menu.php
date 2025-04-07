 <!-- Start Header Area -->
  <style>
    
  </style>
 <header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">
            
            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?= BASE_URL ?>">
                                    <img src="assets/img/logo/logoSTP.png" alt="Brand Logo" style="width: 80px; height: auto;">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-5 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li><a href="<?= BASE_URL ?>">Trang chủ</a>
                                                
                                            </li>
                                         
                                            <li><a href="<?= BASE_URL . '?act=san-pham'?>">Sản phẩm <i class="fa fa-angle-down"></i></a></li>

                                            <li><a href="#">Giới thiệu</a></li>
                                            <li><a href="#">Liên hệ</a></li>
                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-5">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block">
                                        <input type="text" placeholder="Tìm kiếm" class="header-search-field">
                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div>
                                <div class="header-configure-area">
                                    <ul class="nav justify-content-end">
                                        <label for="">
                                            <?php 
                                                if (isset($_SESSION['user_client'])) {
                                                    echo $_SESSION['user_client'];
                                                } 
                                            ?></label>
                                        <li class="user-hover">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list">
                                            <?php 
                                                if (!isset($_SESSION['user_client'])) { ?>
                                                    <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                              <?php  } else{  ?>
                                                
                                                
                                                <li><a href="my-account.html">Tài khoản</a></li>
                                                <?php }?>
                                            </ul>
                                        </li>
                                        
                                        <li>
                                            <a href="#" class="minicart-btn">
                                                <i class="pe-7s-cart"></i>
                                                <?php
                                                    $tongSoLuong = 0;
                                                    if (!empty($chiTietGioHang)) {
                                                        foreach ($chiTietGioHang as $sp) {
                                                            $tongSoLuong += $sp['so_luong'];
                                                        }
                                                    }
                                                ?>
                                                <div class="notification"><?= $tongSoLuong ?></div>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

      
    </header>
    <!-- end Header Area -->

    