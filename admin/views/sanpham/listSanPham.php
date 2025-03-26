
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
            <h1>Quản lý danh sách sản phẩm</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
               <a href="<?=BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                <button class="btn btn-outline-primary">Thêm sản phẩm</button>
               </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>STT</th>
                   <th>Tên sản phẩm</th>
                   <th>Ảnh sản phẩm</th>
                   <th>Giá tiền</th>
                   <th>Số lượng</th>
                   <th>Danh mục sản phẩm</th>
                   <th>Trạng thái</th>
                   <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($listSanPham as $key=>$sanPham): ?>
                    
                  <tr>
                   <td><?= $key + 1 ?></td>
                   <td> <?= $sanPham['ten_san_pham'] ?></td>
                   <td> 
                    <a href="<?=BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" style="width:100px" alt=""
                    onerror="this.onerror=null; this.src='https://1557691689.e.cdneverest.net/fast/1325x0/filters:format(webp)/static.5sfashion.vn/storage/product_color/zx59gbFvSuBvjej3DzJjZV7cqtNlfX36.webp'"
                    ></a>
                  </td>
                  <td> <?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VND</td>

                   <td> <?= $sanPham['so_luong'] ?></td>
                   <td> <?= $sanPham['ten_danh_muc'] ?></td>
                   <td> <?= $sanPham['trang_thai'] == 1 ? 'Còn bán':'Dừng bán' ?></td>
                  
                   <td>
                    <div class="btn-group">
                      <a href="<?=BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                      <button class="btn btn-outline-primary text-dark"><i class="fas fa-eye"></i></button>
                      </a>
                      <a href="<?=BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                      <button class="btn btn-outline-warning text-dark"><i class="fas fa-tools"></i></button>
                      </a>
                      <a href="<?=BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" 
                      onclick="return confirm('Bạn có đồng ý xoá hay không ? ')">
                      <button class="btn btn-outline-danger text-dark"><i class="far fa-trash-alt"></i></button>
                      </a>
                    </div>
                    
                   </td>
                  </tr>
                  
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>STT</th>
                   <th>Tên sản phẩm</th>
                   <th>Ảnh sản phẩm</th>
                   <th>Giá tiền</th>
                   <th>Số lượng</th>
                   <th>Danh mục sản phẩm</th>
                   <th>Trạng thái</th>
                   <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
