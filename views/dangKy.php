

<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
   <!-- end Header Area -->

   <style>
    .text-center {
        text-align: center;
        margin-top: 20px;
    }

    .text-center .btn-primary {
        background-color: #2ecc71;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        border-radius: 8px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .text-center .btn-primary:hover {
        background-color: #27ae60;
        transform: scale(1.05);
    }

    .text-center .btn-primary:active {
        transform: scale(0.98);
    }
</style>


   <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Đăng ký ngay!</h5>
                                    <p class="text-muted">Đăng ký trải nghiệp tốt nhất.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="?act=dang-ky" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="ho_ten" class="form-label">Họ tên</label>
                                                <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?></span>
                                            </div>
                                                <div class="mb-3">
                                                    <label for="bannerImageInput" class="form-label">Ảnh đại diện</label>
                                                    <input type="file" class="form-control" id="bannerImageInput" name="anh_dai_dien" accept="uploads/">
                                                    <span class="text-danger">
                                                        <?= !empty($_SESSION['errors']['anh_dai_dien']) ? $_SESSION['errors']['anh_dai_dien'] : '' ?>
                                                    </span>
                                                </div>
                                            <div class="mb-3">
                                                <label for="ngay_sinh" class="form-label">Ngày Sinh</label>
                                                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                <select class="form-select" name="gioi_tinh" id="gioi_tinh">
                                                    <option value="" selected disabled>Chọn giới tính</option>
                                                    <option value="1">Nam</option>
                                                    <option value="2">Nữ</option>
                                                </select>
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mat_khau" class="form-label">Mật khẩu</label>
                                                <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?></span>
                                            </div>

                                            <div>
                                                <div class="text-center">
                                                    <button type="submit" onclick="dangKyThanhCong()" class="btn btn-primary">Đăng ký</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>