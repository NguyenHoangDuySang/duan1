<!-- Start Header Area -->
<style>
   

</style>

<header class="header-area header-wide">
    <div class="main-header d-none d-lg-block">
        <div class="header-main-area sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- Logo -->
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="<?= BASE_URL ?>">
                                <img src="assets/img/logo/logoSTP.png" alt="Brand Logo" style="width: 80px; height: auto;">
                            </a>
                        </div>
                    </div>

                    <!-- Menu -->
                    <div class="col-lg-5 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="<?= BASE_URL ?>">Trang chủ</a></li>
                                        <li><a href="<?= BASE_URL . '?act=san-pham' ?>">Sản phẩm</a></li>
                                        <li><a href="#">Giới thiệu</a></li>
                                        <li><a href="<?= BASE_URL . '?act=lien-he' ?>">Liên hệ</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <!-- Search + User + Cart -->
                    <div class="col-lg-5">
                        <div class="header-search-container">
                            <button class="search-trigger d-xl-none d-lg-block">
                                <i class="pe-7s-search"></i>
                            </button>
                            <form action="index.php" method="GET" id="search-form" class="header-search-box d-lg-none d-xl-block" autocomplete="off">
                                <input type="hidden" name="act" value="tim-kiem-san-pham">
                                <input type="text" id="tu_khoa" name="tu_khoa" placeholder="Tìm kiếm" class="header-search-field" required>
                                <!-- Vô hiệu hóa nút tìm kiếm -->
                                <button type="button" class="header-search-btn" disabled style="cursor: not-allowed;">
                                    <i class="pe-7s-search"></i>
                                </button>
                                <div id="suggestions"></div>
                            </form>
                        </div>

                        <div class="header-configure-area">
                            <ul class="nav justify-content-end">
                                <label>
                                    <?php if (isset($_SESSION['user_client'])) echo $_SESSION['user_client']; ?>
                                </label>
                                <li class="user-hover">
                                    <a href="#"><i class="pe-7s-user"></i></a>
                                    <ul class="dropdown-list">
                                        <?php if (!isset($_SESSION['user_client'])) { ?>
                                            <li><a href="<?= BASE_URL . '?act=login' ?>">Đăng nhập</a></li>
                                            <li><a href="<?= BASE_URL . '?act=dang-ky' ?>">Đăng ký</a></li>
                                        <?php } else { ?>
                                            <li><a href="<?= BASE_URL . '?act=tai-khoan' ?>">Tài khoản</a></li>
                                            <li><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a></li>
                                            <li><a href="<?= BASE_URL . '?act=logout-client' ?>" onclick="return confirm('Bạn có chắc muốn đăng xuất không?');">Đăng xuất</a></li>
                                        <?php } ?>
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

            </div>
        </div>
    </div>
</header>

<!-- AJAX Search Script -->
<script>
    document.getElementById('tu_khoa').addEventListener('keyup', function() {
        const tuKhoa = this.value;
        const suggestionsBox = document.getElementById('suggestions');

        if (tuKhoa.length === 0) {
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
                suggestionsBox.innerHTML = '';
                data.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item.ten_san_pham;
                    div.addEventListener('click', () => {
                        window.location.href = `<?= BASE_URL ?>?act=chi-tiet-san-pham&id_san_pham=${item.id}`;
                    });
                    suggestionsBox.appendChild(div);
                });
            });
    });

    document.addEventListener("click", function(e) {
        const suggestions = document.getElementById('suggestions');
        const input = document.getElementById('tu_khoa');
        if (!suggestions.contains(e.target) && e.target !== input) {
            suggestions.innerHTML = '';
        }
    });


    // Ngăn form gửi đi khi ấn Enter
    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
    });

    document.getElementById('tu_khoa').addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
        }
    });



</script>