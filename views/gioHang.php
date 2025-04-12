

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
      
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <form action="?act=cap-nhat-gio-hang" method="post">
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger">
                                    <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>

                            <!-- cart-table table here -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                            <th class="pro-title">Tên sản phẩm</th>
                                            <th class="pro-price">Giá tiền</th>
                                            <th class="pro-quantity">Số lượng</th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th class="pro-remove">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $tongGioHang = 0 ;                                      
                                            foreach($chiTietGioHang as $key=>$sanPham):                                           
                                         ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh']?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href=""><?= $sanPham['ten_san_pham']?></a></td>
                                            <td class="pro-price"><span>
                                                <?php 
                                                    if ($sanPham['gia_khuyen_mai']) { ?>
                                                         <?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VNĐ
                                                        
                                                 <?php  }else{ ?>
                                                         <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VNĐ

                                                 <?php } ?>
                                            </span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                <input type="number" name="so_luong[<?= $sanPham['san_pham_id'] ?>]" value="<?= $sanPham['so_luong']?>" min="1">

                                            </div>
                                            </td>
                                            <td class="pro-subtotal"><span>
                                                <?php
                                                    $tongTien  = 0 ;
                                                    if ($sanPham['gia_khuyen_mai']) {
                                                        $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                    }else{
                                                        $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];

                                                    }
                                                    $tongGioHang += $tongTien;
                                                    echo number_format($tongTien, 0, ',', '.') . ' VNĐ';

                                                ?>
                                            </span></td>
                                            <td class="pro-remove">
                                            <a href="?act=xoa-san-pham&san_pham_id=<?= $sanPham['san_pham_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"><i class="fa fa-trash-o"></i></a>


                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart-update">
                                <button type="submit" class="btn btn-sqr">Cập nhật giỏ hàng</button>
                            </div>
                            </form>

                            
                            <!-- Cart Update Option -->
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Chi tiết thanh toán</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng tiền sản phẩm</td>
                                                <td><?= number_format($tongGioHang, 0, ',', '.') . ' VNĐ';?></td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển</td>
                                                <td>30.000 VNĐ</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng thanh toán</td>
                                                <td class="total-amount"><?= number_format($tongGioHang +30000, 0, ',', '.') . ' VNĐ';?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block" style="background-color: red;">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    

    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>