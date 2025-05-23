

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
                        <div class="col-lg-7">  
                            <!-- Thông tin sản phẩm của đơn hàng -->
                            <form action="?act=cap-nhat-gio-hang" method="post">
                            <!-- cart-table table here -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="5" style="background-color:black;">Thông tin sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr class="text-center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                       </tr>
                                       <?php foreach($chiTietDonHang as $item) : ?>
                                            <tr>
                                                <td>
                                                <img class="img-fluid" src="<?= BASE_URL . $item['hinh_anh']?>" alt="Product" width="100px"/>
                                                </td>
                                                <td><?= $item['ten_san_pham'] ?></td>
                                                <td><?= number_format($item['don_gia'], 0, ',', '.') ?>VNĐ</td>
                                                <td><?= $item['so_luong'] ?></td>
                                                <td><?= number_format($item['thanh_tien'], 0, ',', '.') ?>VNĐ</td>

                                                
                                            </tr>
                                       <?php endforeach; ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                          
                          
                        </div>
                         <!-- Thông tin của đơn hàng --> 
                        <div class="col-lg-5">  
                            <!-- Cart Table Area -->
                            <form action="?act=cap-nhat-gio-hang" method="post">
                            <!-- cart-table table here -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2" style="background-color:black;">Thông tin đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th>Mã đơn hàng</th>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Người nhận hàng</th>
                                            <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Email</th>
                                            <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Số điện thoại</th>
                                            <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Địa chỉ nhận hàng</th>
                                            <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Ngày đặt hàng</th>
                                            <td><?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></td>

                                        </tr>
                                        <tr class="text-center">
                                            <th>Ghi chú</th>
                                            <td><?= $donHang['ghi_chu'] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Tổng tiền</th>
                                            <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>

                                        </tr>
                                        <tr class="text-center">
                                            <th>Phương thức thanh toán</th>
                                            <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Trạng thái đơn hàng</th>
                                            <td><?= $trangThaiDonHang[$donHang['trang_thai_id']] ?></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
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