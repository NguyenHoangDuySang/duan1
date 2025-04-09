<h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($_GET['tu_khoa'] ?? '') ?>"</h2>

<?php if (empty($listSanPham)): ?>
    <p>Không tìm thấy sản phẩm nào.</p>
<?php else: ?>
    <div class="product-list">
        <?php foreach ($listSanPham as $sp): ?>
            <div class="product-item">
                <h3><?= $sp['ten_san_pham'] ?></h3>
                <p>Giá: <?= number_format($sp['gia'], 0, ',', '.') ?> VNĐ</p>
                <a href="?act=chi-tiet-san-pham&id_san_pham=<?= $sp['id'] ?>">Xem chi tiết</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
