<?php
$tongTienMini = 0;
$soLuongMini = 0;
?>

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
                        <?php if (!empty($chiTietGioHang)): ?>
                            <?php foreach ($chiTietGioHang as $sp): 
                                $gia = $sp['gia_khuyen_mai'] ? $sp['gia_khuyen_mai'] : $sp['gia_san_pham'];
                                $thanhTien = $gia * $sp['so_luong'];
                                $tongTienMini += $thanhTien;
                                $soLuongMini += $sp['so_luong'];
                            ?>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet&san_pham_id=' . $sp['san_pham_id'] ?>">
                                        <img src="<?= BASE_URL . $sp['hinh_anh'] ?>" alt="<?= $sp['ten_san_pham'] ?>" width="70">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet&san_pham_id=' . $sp['san_pham_id'] ?>">
                                            <?= $sp['ten_san_pham'] ?>
                                        </a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity"><?= $sp['so_luong'] ?> ×</span>
                                        <span class="cart-price"><?= number_format($gia, 0, ',', '.') ?>đ</span>
                                    </p>
                                </div>
                                <a href="<?= BASE_URL . '?act=xoa-gio-hang&san_pham_id=' . $sp['san_pham_id'] ?>" class="minicart-remove">
                                    <i class="pe-7s-close"></i>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="minicart-item text-center">Giỏ hàng trống</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="minicart-pricing-box">
                    <ul>
                        <li><span>Tạm tính</span><span><strong><?= number_format($tongTienMini, 0, ',', '.') ?>đ</strong></span></li>
                        <li class="total"><span>Tổng cộng</span><span><strong><?= number_format($tongTienMini + 30000, 0, ',', '.') ?>đ</strong></span></li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="<?= BASE_URL . '?act=gio-hang' ?>"><i class="fa fa-shopping-cart"></i> Xem giỏ hàng</a>
                    <a href="<?= BASE_URL . '?act=thanh-toan' ?>"><i class="fa fa-credit-card"></i> Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</div>
