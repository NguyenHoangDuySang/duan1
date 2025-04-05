
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
          <div class="col-sm-6">
            <h1>Quản lý tài khoản khách hàng</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
                                <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width:60%" alt=""
                            onerror="this.onerror=null; this.src='./assets/dist/img/IMG_0879.jpg'"
                 >
          </div>
          <div class="col-6">
            <div class="container">
            <table class="table table-borderless">
                    <tbody style="font-size: large;">
                        <tr>
                            <th>Họ tên:</th>
                            <th><?= $khachHang['ho_ten'] ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <th><?= $khachHang['ngay_sinh'] ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <th><?= $khachHang['gioi_tinh'] == 1 ? 'Nam':'Nữ'  ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <th><?= $khachHang['so_dien_thoai'] ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <th><?= $khachHang['email'] ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <th><?= $khachHang['dia_chi'] ?? '' ?></th> 
                        </tr>
                        <tr>
                            <th>Trạng thái:</th>
                            <th><?= $khachHang['trang_thai']  == 1 ? 'Active':'Inactive'  ?? '' ?></th> 
                        </tr>

                    </tbody>
                </table>
            </div>
               
          </div>
          <div class="col-12">
            <hr>
            <h2>Lịch sử mua hàng</h2>
            <div>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>STT</th>
                   <th>Mã đơn hàng</th>
                   <th>Tên người nhận</th>
                   <th>Số điện thoại</th>
                   <th>Ngày đặt</th>
                   <th>Tổng tiền</th>
                   <th>Trạng thái</th>
                   <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listDonHang as $key=>$donHang): ?>
                    
                  <tr>
                   <td><?= $key + 1 ?></td>
                   <td> <?= $donHang['ma_don_hang'] ?></td>
                   <td> <?= $donHang['ten_nguoi_nhan'] ?></td>
                   <td> <?= $donHang['sdt_nguoi_nhan'] ?></td>
                   <td> <?= date("d/m/Y ", strtotime($donHang['ngay_dat'])) ?></td>
                   <td> <?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VND</td>
                   <td> <?= $donHang['ten_trang_thai'] ?></td>
                   
                  
                   <td>
                    <div class="btn-group">
                      <a href="<?=BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                      <button class="btn btn-outline-primary text-dark"><i class="fas fa-eye"></i></button>
                      </a>
                      <a href="<?=BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                      <button class="btn btn-outline-warning text-dark"><i class="fas fa-tools"></i></button>
                      </a>
                      
                    </div>
                    
                   </td>
                  </tr>
                  
                  <?php endforeach ?>
                  </tbody>
                  
                </table>
            </div>
          </div>
          <div class="col-12">
            <hr>
            <h2>Lịch sử bình luận</h2>
            <div>
            <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>STT</th>
                   <th>Sản phẩm</th>
                   <th>Nội dung</th>
                   <th>Ngày bình luận</th>
                   <th>Trạng thái</th>
                   <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listBinhLuan as $key=>$binhLuan): ?>
                    
                  <tr>
                   <td><?= $key + 1 ?></td>
                   <td> <a target="_blank" href="<?=BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a></td>
                   <td> <?= $binhLuan['noi_dung'] ?></td>
                   <td> <?= $binhLuan['ngay_dang'] ?></td>
                   <td> <?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                      
                   <td>
                    
                    <form action="<?=BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                        <input  type="hidden" name="name_view" value="detail_khach">
                        <button onclick="return confirm('Bạn có muốn ẩn bình luận này không ? ')" class="btn btn-outline-danger text-dark"><?=$binhLuan['trang_thai'] == 1 ?'Ẩn':'Hiện' ?></button>
                    </form>
                    
                   
        
                    
                   </td>
                  </tr>
                  
                  <?php endforeach ?>
                  </tbody>
                  
                </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- footer -->
<?php include './views/layout/footer.php'; ?>
  <!-- /.end footer -->

</script>
</body>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
     "responsive": true, "lengthChange": false, "autoWidth": false,
    });
  });
</script>
</html>
