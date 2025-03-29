
<!-- header -->

<?php include './views/layout/header.php'; ?>
 
  <!-- /.header -->


  <!-- Navbar -->
 
<?php include './views/layout/navbar.php'; ?>


  <!-- /.navbar -->

<?php include './views/layout/sidebar.php'; ?>



  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
           
          <div class="col-sm-10">
            <h1>Đơn hàng : <?= $donHang['ma_don_hang']?></h1>
          </div>
         <div class="col-sm-2">
            
            <form action="" method="post">
                <select name="" id="" class="form-group">
                    <?php foreach($listTrangThaiDonHang as $key=>$trangThai): ?>
                    <option 
                            <?= $trangThai['id'] == $donHang['trang_thai_id'] ?'selected':'' ?> 
                            <?= $trangThai['id'] < $donHang['trang_thai_id'] ?'disabled':'' ?> 
                            value="<?= $trangThai['id']; ?>">
                            <?= $trangThai['ten_trang_thai']; ?>

                    </option>
                    <?php endforeach ?>
                </select>
            </form>
         </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <?php 
    switch ($donHang['trang_thai_id']) {
        case 1:
            $colorAlerts = 'secondary'; // Chưa xác nhận (xám)
            break;
        case 2:
            $colorAlerts = 'info'; // Đã xác nhận (xanh dương nhạt)
            break;
        case 3:
            $colorAlerts = 'danger'; // Chưa thanh toán (đỏ)
            break;
        case 4:
            $colorAlerts = 'primary'; // Đã thanh toán (xanh dương đậm)
            break;
        case 5:
        case 6:
            $colorAlerts = 'warning'; // Đang chuẩn bị hoặc giao hàng (vàng)
            break;
        case 7:
        case 8:
        case 9:
            $colorAlerts = 'success'; // Đã giao, nhận, thành công (xanh lá)
            break;
        case 10:
            $colorAlerts = 'danger'; // Hoàn hàng (đỏ)
            break;
        default:
            $colorAlerts = 'danger'; // Lỗi hoặc trạng thái không xác định (đỏ)
            break;
    }
?>

<div class="alert alert-<?= $colorAlerts; ?>" role="alert">
    Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
</div>



            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="nav-icon fas fa-tshirt"></i> SHOP STP.
                    <small class="float-right">
                            <i class="fas fa-clock fa-rotate-270 fa-lg"></i> 
                            Ngày đặt: <?= date("d/m/Y ", strtotime($donHang['ngay_dat'])) ?>
                    </small>                  
                    </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <strong>Thông tin người đặt hàng </strong>
                  <address>
                    <strong>Họ và tên:</strong> <?= $donHang['ho_ten'] ?><br>
                    <strong>Số điện thoại:</strong> <?= $donHang['so_dien_thoai'] ?><br>
                    <strong> Email:</strong> <?= $donHang['email'] ?><br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Người nhận</strong>
                  <address>
                    <strong>Họ và tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?><br> 
                    <strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?><br>
                    <strong> Email:</strong> <?= $donHang['email_nguoi_nhan'] ?><br>
                    <strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
                    
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <strong>Thông tin đơn hàng</strong>
                  <address>
                    <strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?><br>
                    <strong>Tổng tiền:</strong> <?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND<br>
                    <strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?><br>
                    <strong>Phương thức thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?><br>
                    
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th>Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $tong_tien = 0; ?>
                        <?php foreach($sanPhamDonHang as $key=>$sanPham): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanPham['ten_san_pham'] ?></td>
                      <td><?= $sanPham['don_gia'] ?></td>
                      <td><?= $sanPham['so_luong'] ?></td>
                      <td><?= number_format($sanPham['thanh_tien'], 0, ',', '.') ?> VND</td>
                     
                    </tr>
                    <?php $tong_tien += $sanPham['thanh_tien']; ?>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                
                <!-- /.col -->
                <div class="col-6 ">
                  <p class="lead">Ngày đặt hàng: <?= date("d/m/Y ", strtotime($donHang['ngay_dat'])) ?></p>

                  <div class="table-responsive">
                    <table class="table">
                    <tr>
                        <th style="width:50%">Tổng tiền hàng:</th>
                        <td><?= number_format($tong_tien, 0, ',', '.') ?> VND</td>
                    </tr>
                      </tr>
                      
                      <tr>
                        <th>Phí vận chuyển:</th>
                        <td>50.000 VND</td>
                      </tr>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td><strong><?= number_format($tong_tien + 50000, 0, ',', '.') ?> VND</strong></td>

                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
<?php include './views/layout/footer.php'; ?>
  <!-- /.end footer -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- Code injected by live-server -->
</script>
</body>
</html>
