

<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
   <!-- end Header Area -->



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
                            <!-- cart-table table here -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color:gray;">
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày đặt</th>
                                            <th>Tổng tiền</th>
                                            <th>Phương thức thanh toán</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($donHangs as $donHang) :?>
                                                <tr>
                                                    <td><?= $donHang['ma_don_hang'] ?></td>
                                                    <td><?= $donHang['ngay_dat'] ?></td>
                                                    <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
                                                    <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                                    <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                                    <td>
                                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr">
                                                               xem chi tiet
                                                            </a>
                                                            <?php if($donHang['trang_thai_id'] == 1 ) :?>
                                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-sqr"
                                                                    onclick="return confirm('Bạn có muốn huỷ đơn hàng')">
                                                                    Huỷ đơn
                                                                </a>

                                                            <?php endif; ?>
                                                    </td>  
                                                </tr>
                                        <?php endforeach ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                          
                            

                            
                            <!-- Cart Update Option -->
                          
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>

    

    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>