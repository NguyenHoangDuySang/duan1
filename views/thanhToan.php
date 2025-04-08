

<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
   <!-- end Header Area -->



   <main>
        <!-- breadcrumb area start -->
        
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <div class="checkoutaccordion" id="checkOutAccordion">
                           

                            <div class="card">
                                <h6>Áp mã giảm giá ? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">
                                            Nhập Code</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Nhập Code" required />
                                                    <button class="btn btn-sqr">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="POST">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Thông tin người nhận</h5>
                            <div class="billing-form-wrap">
                               
                                   

                                    <div class="single-input-item">
                                        <label for="ten_nguoi_nhan" class="required">Tên </label>
                                        <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten']?>" placeholder="Nhập tên " required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="email_nguoi_nhan" class="required">Email</label>
                                        <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email']?>" placeholder="Email" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="sdt_nguoi_nhan" class="required">Số điện thoai</label>
                                        <input type="number" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai']?>" placeholder="Số điện thoai" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ</label>
                                        <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi']?>" placeholder="Địa chỉ" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="ghi_chu">Ghi chú</label>
                                        <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Ghi chú ."></textarea>
                                    </div>
                               
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Chi tiết thanh toán</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           
                                            <?php 
                                            $tongGioHang = 0 ;                                      
                                            foreach($chiTietGioHang as $key=>$sanPham):                                           
                                         ?>
                                        <tr>
                                                <td>
                                                    <a href="">
                                                        <?= $sanPham['ten_san_pham']?> <strong> × <?= $sanPham['so_luong']?></strong>
                                                    </a>
                                                </td>
                                                <td>
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
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Tạm tính</td>
                                                <td class="total-amount"><?= number_format($tongGioHang, 0, ',', '.') . ' VNĐ';?></td>
                                                <td><strong></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Phí vận chuyển</td>
                                                <td class="d-flex justify-content-center">
                                                    <ul class="shipping-type">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                                <label class="custom-control-label" for="flatrate">
                                                                     30.000 VNĐ</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                
                                                                
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng tiền</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongGioHang +30000?>">
                                                <td class="total-amount"><?= number_format($tongGioHang +30000, 0, ',', '.') . ' VNĐ';?></td>
                                                <td><strong></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon"  name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng !</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Khách hàng có thể thanh toán sau khi đã nhận hàng thành công.</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank"   name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Ví điện tử MoMo(*****3762)</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Thanh toán online.</p>
                                        </div>
                                    </div>
                                  
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                                <label class="custom-control-label" for="paypalpayment">Paypal <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p style="color: red;">Đang bảo trì.</p>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận đặt hàng
                                          </label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr" style="background-color: red;">Đặt hàng</button>
                                      
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
    

    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>