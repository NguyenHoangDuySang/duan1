<?php require_once 'layout/header.php'; ?>
<!-- start Header Area -->
<?php require_once 'layout/menu.php'; ?>
<!-- end Header Area -->
<style>
    /* Ảnh lớn hiển thị chính */
    .product-large-slider .pro-large-img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        /* Đảm bảo ảnh vừa khung và không bị méo */
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
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }


    .product-large-slider+.pro-nav {
        margin-top: 100px !important;
    }

    .product-carousel-4 {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: stretch;
        /* Đảm bảo các div có chiều cao bằng nhau */
    }

    .product-item {
        flex: 1 1 calc(25% - 10px);
        /* Chia đều 4 cột */
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
        height: 250px;
        /* Cố định chiều cao ảnh */
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
        object-fit: contain;
        /* Giữ nguyên tỉ lệ ảnh mà không bị méo */
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
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Login Coupon Accordion Start -->
                    <div class="checkoutaccordion" id="checkOutAccordion">
                        <div class="card">
                            <h6>Thêm mã giảm giá <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                    Nhập mã giảm giá</span></h6>
                            <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div class="apply-coupon-wrapper">
                                            <form action="#" method="post" class=" d-block d-md-flex">
                                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                                <button class="btn btn-sqr">Dùng giảm giá</button>
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
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
                        <h5 class="checkout-title">Thông tin khách hàng</h5>
                        <div class="billing-form-wrap">
                            <form action="#">

                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan" class="required">Tên người nhận</label>
                                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan" class="required">Địa chỉ email</label>
                                    <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Địa chỉ email" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="sdt_nguoi_nhan" class="required">Số điện thoại</label>
                                    <input type="text" id="sdt_nguoi_nhan" name="so_dien_thoai" value="<?= $user['so_dien_thoai'] ?>" placeholder="Số điện thoại" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan" class="required">Địa chỉ người nhận</label>
                                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ người nhận" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="com-name">Company Name</label>
                                    <input type="text" id="com-name" placeholder="Company Name" />
                                </div>

                                <div class="single-input-item">
                                    <label for="country" class="required">Quốc gia</label>
                                    <select name="country nice-select" id="country">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algérie</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="India">Ấn Độ</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="England">Anh</option>
                                        <option value="London">Luân Đôn</option>
                                        <option value="Chaina">Trung Quốc</option>

                                    </select>
                                </div>

                                <div class="single-input-item">
                                    <label for="street-address" class="required mt-20">Street address</label>
                                    <input type="text" id="street-address" placeholder="Street address Line 1" required />
                                </div>

                                <div class="single-input-item">
                                    <input type="text" placeholder="Street address Line 2 (Optional)" />
                                </div>

                                <div class="single-input-item">
                                    <label for="town" class="required">Town / City</label>
                                    <input type="text" id="town" placeholder="Town / City" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="state">State / Divition</label>
                                    <input type="text" id="state" placeholder="State / Divition" />
                                </div>

                                <div class="single-input-item">
                                    <label for="postcode" class="required">Postcode / ZIP</label>
                                    <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                </div>

                                <div class="single-input-item">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" placeholder="Phone" />
                                </div>

                                <div class="checkout-box-wrap">
                                    <div class="single-input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="create_pwd">
                                            <label class="custom-control-label" for="create_pwd">Create an
                                                account?</label>
                                        </div>
                                    </div>
                                    <div class="account-create single-form-row">
                                        <p>Create an account by entering the information below. If you are a
                                            returning customer please login at the top of the page.</p>
                                        <div class="single-input-item">
                                            <label for="pwd" class="required">Account Password</label>
                                            <input type="password" id="pwd" placeholder="Account Password" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="checkout-box-wrap">
                                    <div class="single-input-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                            <label class="custom-control-label" for="ship_to_different">Ship to a
                                                different address?</label>
                                        </div>
                                    </div>
                                    <div class="ship-to-different single-form-row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label for="f_name_2" class="required">First Name</label>
                                                    <input type="text" id="f_name_2" placeholder="First Name" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <label for="l_name_2" class="required">Last Name</label>
                                                    <input type="text" id="l_name_2" placeholder="Last Name" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <label for="email_2" class="required">Email Address</label>
                                            <input type="email" id="email_2" placeholder="Email Address" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="com-name_2">Company Name</label>
                                            <input type="text" id="com-name_2" placeholder="Company Name" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="country_2" class="required">Country</label>
                                            <select name="country" id="country_2">
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="India">India</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="England">England</option>
                                                <option value="London">London</option>
                                                <option value="London">London</option>
                                                <option value="Chaina">Chaina</option>
                                            </select>
                                        </div>

                                        <div class="single-input-item">
                                            <label for="street-address_2" class="required mt-20">Street address</label>
                                            <input type="text" id="street-address_2" placeholder="Street address Line 1" required />
                                        </div>

                                        <div class="single-input-item">
                                            <input type="text" placeholder="Street address Line 2 (Optional)" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="town_2" class="required">Town / City</label>
                                            <input type="text" id="town_2" placeholder="Town / City" required />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="state_2">State / Divition</label>
                                            <input type="text" id="state_2" placeholder="State / Divition" />
                                        </div>

                                        <div class="single-input-item">
                                            <label for="postcode_2" class="required">Postcode / ZIP</label>
                                            <input type="text" id="postcode_2" placeholder="Postcode / ZIP" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <label for="ordernote">Order Note</label>
                                    <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details">
                        <h5 class="checkout-title">Thông tin sản phẩm</h5>
                        <div class="order-summary-content">
                            <!-- Order Summary Table -->
                            <div class="order-summary-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php ?>

                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key => $sanPham): ?>
                                            <tr>
                                                <td><a href=""><?= $sanPham['ten_san_pham'] ?><strong> x <?= $sanPham['so_luong'] ?></strong></a>
                                                </td>
                                                <td>
                                                    <?php
                                                    $tongTien  = 0;
                                                    if ($sanPham['gia_khuyen_mai']) {
                                                        $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                                    } else {
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
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><strong><?= formatPrice($tongGioHang) . ' VNĐ' ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Vận chuyển</td>
                                            <td class="d-flex justify-content-center">
                                                <strong>30.000 đ</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tổng đơn hàng</td>
                                            <td><strong><?= number_format($tongGioHang + 30000, 0, ',', '.') . ' VNĐ'; ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Order Payment Method -->
                            <div class="order-payment-method">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Khách hàng có thể thanh toán sau khi đã nhận hàng thành công(cần xác nhận đơn hàng).</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Thanh toán online</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Khách hàng cần thanh toán online</p>
                                    </div>
                                </div>

                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox mb-20">
                                        <input type="checkbox" class="custom-control-input" id="terms" required />
                                        <label class="custom-control-label" for="terms">Xác nhận đặt hàng <a href="index.html">terms and conditions.</a></label>
                                    </div>
                                    <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>