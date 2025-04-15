 <!-- Start Header Area -->
  <style>
    .header-search-box {
        position: relative;
        width: 100%;
    }

    .header-search-field {
        width: 100%;
        padding: 8px 100px 8px 12px;
        border-radius: 25px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    #suggestions {
    max-height: 300px; 
    overflow-y: auto;
    background: #fff;
    border: 1px solid #ccc;
    position: absolute;
    width: 100%;
    z-index: 1000;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    border-radius: 4px;
    z-index: 10;
}

    #suggestions div {
        padding: 8px 12px;
        cursor: pointer;
    }

    #suggestions div:hover {
        background-color: #f1f1f1;
    }
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
                                            <li><a href="<?= BASE_URL . '?act=lien-he'?>">Liên hệ</a></li>
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
                                    <form action="index.php" method="GET" id="search-form" class="header-search-box d-lg-none d-xl-block" autocomplete="off">
                                <input type="hidden" name="act" value="tim-kiem-san-pham">
                                <input type="text" id="tu_khoa" name="tu_khoa" placeholder="Tìm kiếm" class="header-search-field" required>

                                <button type="button" class="header-search-btn" disabled style="cursor: not-allowed;">
                                   
                                </button>
                                <div id="suggestions"></div>
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
                                                    <li><a href="<?= BASE_URL . '?act=dang-ky' ?>">Đăng ký</a></li>
                                              <?php  } else{  ?>
                                                <li><a href="<?= BASE_URL . '?act=dang-xuat' ?>">Đăng xuất</a></li>
                                                <li><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a></li>
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

    <!-- AJAX Search Script -->
<!-- AJAX Search Script -->
<script>
    const input = document.getElementById('tu_khoa');
    const suggestionsBox = document.getElementById('suggestions');

    input.addEventListener('keyup', () => {
        const tuKhoa = input.value.trim();

        if (!tuKhoa) {
            suggestionsBox.innerHTML = '';
            return;
        }

        fetch('<?= BASE_URL ?>?act=goi-y-san-pham', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'tu_khoa=' + encodeURIComponent(tuKhoa)
        })
            .then(res => res.json())
            .then(data => {
                suggestionsBox.innerHTML = data.length
                    ? data.map(sanPham => {
                        const gia_san_pham = sanPham.gia_khuyen_mai && sanPham.gia_khuyen_mai < sanPham.gia_san_pham
    ? `<span style="color:red; font-weight:bold;">${Number(sanPham.gia_khuyen_mai).toLocaleString()}₫</span> 
       <del style="color:gray; margin-left: 6px;">${Number(sanPham.gia_san_pham).toLocaleString()}₫</del>`
    : `<span style="font-weight:bold;">${Number(sanPham.gia_san_pham).toLocaleString()}₫</span>`;


                            return `
    <div onclick="window.location.href='<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=${sanPham.id}'"
        style="display: flex; align-items: center; padding: 4px 6px; cursor: pointer; border-bottom: 1px solid #eee;">
        <img src="${sanPham.hinh_anh}" alt="${sanPham.ten_san_pham}" 
            style="width: 38px; height: 38px; object-fit: cover; margin-right: 8px; border-radius: 3px;">
        <div style="font-size: 13px; line-height: 1.3;">
            <div style="font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 180px;">
                ${sanPham.ten_san_pham}
            </div>
            <div>${gia_san_pham}</div>
        </div>
    </div>
`;
                    }).join('')
                    : '<div style="padding: 8px;">Không có sản phẩm này</div>';
            });
    });


    document.addEventListener("click", function (e) {
        const suggestions = document.getElementById('suggestions');
        const input = document.getElementById('tu_khoa');
        if (!suggestions.contains(e.target) && e.target !== input) {
            suggestions.innerHTML = '';
        }
    });



    document.getElementById('search-form').addEventListener('submit', function (e) {
        e.preventDefault();
    });


</script>