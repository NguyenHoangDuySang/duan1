<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
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
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">Sản phẩm</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">

                                        <?php foreach($listAnhSanPham as $key=>$anhSanPham) : ?>
                                            <div class="pro-large-img img-zoom">
                                                <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh']?>" alt="product-details" />
                                            </div>
                                        <?php endforeach ?>
                                        
                                    </div>
                                    <div class="pro-nav slick-row-10 slick-arrow-style">

                                        <?php foreach($listAnhSanPham as $key=>$anhSanPham) : ?>
                                            <div class="pro-nav-thumb">
                                                <img src="<?= BASE_URL . $anhSanPham['link_hinh_anh']?>" alt="product-details" />
                                            </div>
                                        <?php endforeach ?>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name" >
                                            <strong><a href="" style="font-size:20px;">Danh mục sản phẩm:   <?= $sanPham['ten_danh_muc']?></a></strong>
                                        </div>
                                        <h3 class="product-name">Sản phẩm:  <?= $sanPham['ten_san_pham']?></h3>
                                        <div class="ratings d-flex">
                                            <div class="pro-review">
                                                <?php $countComment = count($listBinhLuan); ?>
                                                <span><?= $countComment . '  bình luận'?></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                                         <?php    if ($sanPham['gia_khuyen_mai']) { ?>
                                                             <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_khuyen_mai']) . ' VND' ?></strong></span>
                                                             <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></del></span>
                                                        <?php } else { ?>

                                                            <span class="price-regular" style="color:red"><strong><?= formatPrice($sanPham['gia_san_pham']) . ' VND' ?></strong></span>
                                                        
                                                        <?php } ?>
                                            
                                        </div>
                                       
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <span>Số lượng sản phẩm trong kho: <?= $sanPham['so_luong']?></span>
                                        </div>
                                        <p class="pro-desc"> <?= $sanPham['mo_ta']?></p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">Số lượng:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty"><input type="text" value="1"></div>
                                            </div>
                                            
                                            <div class="action_link">
                                                <a class="btn btn-cart2" href="#">Thêm giỏ hàng</a>
                                            </div>
                                        </div>
                                       
                                       
                                       
                                        <div class="like-icon">
                                            <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                            <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                            <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                           
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_three">Đánh giá của khách hàng (<?= $countComment ?>)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                
                                            <div class="tab-pane fade show active" id="tab_three">
                                               
                                                   <?php foreach($listBinhLuan as $binhLuan): ?>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= $binhLuan['anh_dai_dien']?>" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                           
                                                            <div class="post-author">
                                                                <p><span><?= $binhLuan['ho_ten']?> - </span><?=date("d/m/Y ", strtotime($binhLuan['ngay_dang']) )?></p>
                                                            </div>
                                                            <p><?= $binhLuan['noi_dung']?></p>
                                                        </div>
                                                    </div>
                                                    <?php endforeach ?>
                                                    <form action="#" class="review-form"></form>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <label class="col-form-label"><span class="text-danger">*</span>
                                                                Viết đánh giá</label>
                                                            <textarea class="form-control" required></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="buttons">
                                                        <button class="btn btn-sqr" type="submit">Gửi</button>
                                                    </div>
                                                </form> <!-- end of review-form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm liên quan</h2>
                            <p class="sub-title">Thêm sản phẩm liên quan vào danh sách hàng tuần</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php foreach($listSanPhamCungDanhMuc as $key=>$sanPham): ?>
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
            </div>
        </section>
        <!-- related products area end -->
    </main>


  

    

    <!-- offcanvas mini cart start -->
    <div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
            <div class="offcanvas-overlay"></div>
            <div class="minicart-inner-content">
                <div class="minicart-close">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/cart/cart-1.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$100.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="product-details.html">
                                        <img src="assets/img/cart/cart-2.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="product-details.html">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$80.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>$300.00</strong></span>
                            </li>
                            <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>
                            <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong>$370.00</strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="cart.html"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="cart.html"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas mini cart end -->

   <?php require_once 'layout/footer.php'; ?>