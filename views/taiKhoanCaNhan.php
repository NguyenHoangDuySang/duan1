

<?php require_once 'layout/header.php';?>
  <!-- start Header Area -->
<?php require_once 'layout/menu.php';?>
   <!-- end Header Area -->

   


   <h2>Danh sách tài khoản cá nhân</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
    </tr>
    <?php foreach ($danhSachTaiKhoan as $tk): ?>
    <tr>
        <td><?= $tk['id'] ?></td>
        <td><?= $tk['ho_ten'] ?></td>
        <td><?= $tk['email'] ?></td>
        <td><?= $tk['gioi_tinh'] == '1' ? 'Nam' : 'Nữ' ?></td>
        <td><?= $tk['ngay_sinh'] ?></td>
        <td><?= $tk['dia_chi'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- Phân trang -->
<div style="margin-top: 20px;">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?act=tai-khoan&page=<?= $i ?>" 
           style="margin: 0 5px; <?= ($i == $page) ? 'font-weight: bold;' : '' ?>">
           <?= $i ?>
        </a>
    <?php endfor; ?>
</div>


    
   <?php require_once 'layout/miniCart.php'; ?>
   <?php require_once 'layout/footer.php'; ?>