<?php require_once 'views/layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'views/layout/menu.php';?>
   <!-- end Header Area -->
<style>
  /* Ảnh lớn hiển thị chính */
.product-large-slider .pro-large-img img {
    width: 100%;
    height: 400px;
    object-fit: cover;  /* Đảm bảo ảnh vừa khung và không bị méo */
    border-radius: 8px;
}

/* Ảnh nhỏ bên dưới (thumbnail) */
.pro-nav-thumb img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
    transition: transform 0.3s ease, box-shadow 0.3s;
}

.pro-nav-thumb img:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    cursor: pointer;
}


.product-large-slider + .pro-nav {
    margin-top: 100px !important;
}

.product-carousel-4 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: stretch; /* Đảm bảo các div có chiều cao bằng nhau */
}

.product-item {
    flex: 1 1 calc(25% - 10px); /* Chia đều 4 cột */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    background: #fff;
    height: 100%;
}

.product-thumb {
    width: 100%;
    height: 250px; /* Cố định chiều cao ảnh */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    background: #f8f8f8;
    border-radius: 8px;
}

.product-thumb img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Giữ nguyên tỉ lệ ảnh mà không bị méo */
}

.product-caption {
    flex-grow: 1;
    text-align: center;
    padding: 10px;
}
</style>



  
<main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container" style="max-width: 40vw;">
                <div class="member-area-from-wrap">
                    <div class="row">
                        <!-- Login Content Start -->
                        <div class="col-lg-12">
                            <div class="login-reg-form-wrap">
                                <h5 class="text-center">Đăng nhập</h5>
                                <h5 class="text-primary text-center">Chào mừng trở lại !</h5>
                                    <?php if (isset($_SESSION['error'])) { ?>
                                        <div class="text-danger text-center"><?= $_SESSION['error'] ?></div>
                                    <?php } else { ?>
                                        <div class="login-box-msg text-center">Vui lòng đăng nhập để tiếp tục!</div>
                                    <?php } ?>
                                <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" placeholder="Nhập email" name="email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" placeholder="Nhập password" name="password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                           
                                            <a href="#" class="forget-pwd">Quên mật khẩu</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button class="btn btn-sqr">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                        <!-- Register Content Start -->
                       
                        <!-- Register Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>
    

    <!-- offcanvas mini cart start -->
   
    <!-- offcanvas mini cart end -->

   <?php require_once 'views/layout/footer.php'; ?>