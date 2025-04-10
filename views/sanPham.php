
<?php
if (session_status() == PHP_SESSION_NONE) session_start();

// Gọi các model (dùng đường dẫn tương đối vì bạn không dùng autoload)
require_once __DIR__ . '/../models/GioHang.php';
require_once __DIR__ . '/../models/TaiKhoan.php';

$modelGioHang = new GioHang();
$modelTaiKhoan = new TaiKhoan();

$chiTietGioHang = [];

if (isset($_SESSION['user_client'])) {
    $user = $modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
    $gioHang = $modelGioHang->getGioHangFromUser($user['id']);
    if ($gioHang) {
        $chiTietGioHang = $modelGioHang->getDetailGioHang($gioHang['id']);
    }
}
?>

<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
   <!-- end Header Area -->
<style>
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
        <!-- hero slider area start -->
       
        <!-- hero slider area end -->

        <!-- twitter feed area start -->
      
        <!-- twitter feed area end -->

        <!-- service policy area start -->
      
        <!-- service policy area end -->

        <!-- banner statistics area start -->
       
        <!-- banner statistics area end -->

        <!-- product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm mới</h2>
                            <p class="sub-title">Sản phẩm mới được cập nhật liên tục</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                           

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach($listSanPham as $key=>$sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                        $ngayHienTai = new DateTime();
                                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                        if ($tinhNgay->days <= 7) {
                                                     ?>
                                                            <div class="product-label new" style="background-color: dodgerblue;">
                                                                <span>New</span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                                
                                                <div class="cart-hover" >
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><button class="btn btn-cart" style="background-color: dodgerblue">Xem chi tiết</button></a>
                                                    
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                        <?php    if ($sanPham['gia_khuyen_mai']) { ?>
                                                             <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></strong></span>
                                                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></del></span>
                                                        <?php } else { ?>

                                                            <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></strong></span>
                                                        
                                                        <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                         <?php endforeach ?>

                                       
                                    </div>
                                </div>
                             
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- product banner statistics area start -->
    
        
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm bán chạy</h2>
                            
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                           

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach($listSanPham as $key=>$sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                        $ngayHienTai = new DateTime();
                                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                        if ($tinhNgay->days <= 7) {
                                                     ?>
                                                            <div class="product-label new" style="background-color: dodgerblue;">
                                                                <span>New</span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                                
                                                <div class="cart-hover" >
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><button class="btn btn-cart" style="background-color: dodgerblue">Xem chi tiết</button></a>
                                                    
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                        <?php    if ($sanPham['gia_khuyen_mai']) { ?>
                                                             <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></strong></span>
                                                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></del></span>
                                                        <?php } else { ?>

                                                            <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></strong></span>
                                                        
                                                        <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                         <?php endforeach ?>

                                       
                                    </div>
                                </div>
                             
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                           

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach($listSanPham as $key=>$sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                        $ngayHienTai = new DateTime();
                                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                        if ($tinhNgay->days <= 7) {
                                                     ?>
                                                            <div class="product-label new" style="background-color: dodgerblue;">
                                                                <span>New</span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                                
                                                <div class="cart-hover" >
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><button class="btn btn-cart" style="background-color: dodgerblue">Xem chi tiết</button></a>
                                                    
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                        <?php    if ($sanPham['gia_khuyen_mai']) { ?>
                                                             <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></strong></span>
                                                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></del></span>
                                                        <?php } else { ?>

                                                            <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></strong></span>
                                                        
                                                        <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                         <?php endforeach ?>

                                       
                                    </div>
                                </div>
                             
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="product-container">
                           

                            <!-- product tab content start -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
                                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                        <?php foreach($listSanPham as $key=>$sanPham): ?>
                                        <!-- product item start -->
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                                    <img class="pri-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                    <img class="sec-img" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="product">
                                                </a>
                                                <div class="product-badge">
                                                    <?php 
                                                        $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                        $ngayHienTai = new DateTime();
                                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                        if ($tinhNgay->days <= 7) {
                                                     ?>
                                                            <div class="product-label new" style="background-color: dodgerblue;">
                                                                <span>New</span>
                                                            </div>
                                                    <?php
                                                        }
                                                    ?>
                                                    <?php if ($sanPham['gia_khuyen_mai']) { ?>
                                                        <div class="product-label discount">
                                                            <span>Giảm giá</span>
                                                        </div>
                                                    <?php  } ?>
                                                </div>
                                                
                                                <div class="cart-hover" >
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><button class="btn btn-cart" style="background-color: dodgerblue">Xem chi tiết</button></a>
                                                    
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                               
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>"><?= $sanPham['ten_san_pham']?></a>
                                                </h6>
                                                <div class="price-box">
                                                        <?php    if ($sanPham['gia_khuyen_mai']) { ?>
                                                             <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></strong></span>
                                                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></del></span>
                                                        <?php } else { ?>

                                                            <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></strong></span>
                                                        
                                                        <?php } ?>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product item end -->
                                         <?php endforeach ?>

                                       
                                    </div>
                                </div>
                             
                            </div>
                            <!-- product tab content end -->
                        </div>
                    </div>
                </div>
              
            </div>
        </section>
        <!-- featured product area end -->

        <!-- testimonial area start -->
      
        <br>
        <section class="latest-blog-area section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">blog mới nhất</h2>
                            <p class="sub-title">Có những bài đăng blog mới nhất</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="#">
                                        <img src="assets/img/blog/blog-img1 14.26.54.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="#">Cận Cảnh Giày Và Túi</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="#">
                                        <img src="assets/img/blog/blog-img2 14.26.54.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="#">Người Phụ Nữ Mặc áo Sọc Xanh Trắng Giơ Tay Trái Lên</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="#">
                                        <img src="assets/img/blog/blog-img3 14.26.54.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="#">Phụ kiện thời trang</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="#">
                                        <img src="assets/img/blog/blog-img4 14.26.54.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="#">Áo Len Nữ Màu Hồng Và Váy Kẻ Sọc Nâu</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->

                            <!-- blog post item start -->
                            <div class="blog-post-item">
                                <figure class="blog-thumb">
                                    <a href="#">
                                        <img src="assets/img/blog/blog-img5 14.26.54.jpg" alt="">
                                    </a>
                                </figure>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        
                                    </div>
                                    <h5 class="blog-title">
                                        <a href="#">Người Phụ Nữ Mỉm Cười đứng Thẳng Lưng Dựa Vào Bức Tường Màu Vàng</a>
                                    </h5>
                                </div>
                            </div>
                            <!-- blog post item end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- group product start -->
        
        <!-- group product end -->

        <!-- latest blog area start -->
     
        <!-- latest blog area end -->

        <!-- brand logo area start -->
        <div class="brand-logo section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-logo-carousel slick-row-10 slick-arrow-style">
                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/1.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/2.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/3.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/4.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/5.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->

                            <!-- single brand start -->
                            <div class="brand-item">
                                <a href="#">
                                    <img src="assets/img/brand/6.png" alt="">
                                </a>
                            </div>
                            <!-- single brand end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand logo area end -->
    </main>

  

    

    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>