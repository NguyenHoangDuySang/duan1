
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
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <!-- <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3> -->
              <div class="col-12">
                <img style="width: 580px; height: 580px" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
                 <?php foreach($listAnhSanPham as $key=>$anhSP): ?>
                <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active':'' ?>" ><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                <!-- <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div> -->
                <?php endforeach?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
             
                    
             
            

              

              <div style="max-width: 600px; margin: 20px auto; padding: 20px; border-radius: 10px; background: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
    <h3 style="font-size: 26px; font-weight: bold; color: #333; text-transform: uppercase; text-align: center; margin-bottom: 10px;">
        Tên sản phẩm: <?= $sanPham['ten_san_pham'] ?>
    </h3>
    <hr>

    <h4 style="font-size: 18px; font-weight: 500; color: #444; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Giá tiền: <small style="color: #555;"><?= number_format($sanPham['gia_san_pham'], 0, ',', '.') ?> VND</small>
    </h4>
    <h4 style="font-size: 18px; font-weight: bold; color: red; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Giá khuyến mãi: <small><?= number_format($sanPham['gia_khuyen_mai'], 0, ',', '.') ?> VND</small>
    </h4>
    <h4 style="font-size: 18px; font-weight: bold; color: #007bff; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Số lượng: <small><?= $sanPham['so_luong'] ?></small>
    </h4>
    <h4 style="font-size: 18px; font-weight: bold; color: #007bff; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Lượt xem: <small><?= $sanPham['luot_xem'] ?></small>
    </h4>
    <h4 style="font-size: 18px; font-weight: 500; color: #444; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Ngày nhập: <small><?= $sanPham['ngay_nhap'] ?></small>
    </h4>
    <h4 style="font-size: 18px; font-weight: 500; color: #444; border-bottom: 1px solid #ddd; padding: 8px 0;">
        Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small>
    </h4>
    <h4 style="font-size: 18px; font-weight: bold; border-bottom: 1px solid #ddd; padding: 8px 0; color: <?= $sanPham['trang_thai'] == 1 ? 'green' : 'red' ?>;">
        Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small>
    </h4>
    <h4 style="font-size: 18px; font-style: italic; color: #666; padding: 8px 0;">
        Mô tả: <small><?= $sanPham['mo_ta'] ?></small>
    </h4>
</div>


           
            </div>
          </div>
          <!-- <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận sản phẩm</a>
                
              
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="container">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Người bình luận</th>
                      <th>Nội dung</th>
                      <th>Ngày đăng</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>nguyen duy sang</td>
                      <td>bass mon du an 1</td>
                      <td>25-03-2025</td>
                      <td>
                        <div class="btn-group">
                          <a href=""><button class="btn btn-outline-primary text-dark"><i class="far fa-eye"></i></button></a>
                          <a href=""><button class="btn btn-outline-danger text-dark"><i class="far fa-trash-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>nguyen duy sang</td>
                      <td>bass mon du an 1</td>
                      <td>25-03-2025</td>
                      <td>
                        <div class="btn-group">
                          <a href=""><button class="btn btn-outline-primary text-dark"><i class="far fa-eye"></i></button></a>
                          <a href=""><button class="btn btn-outline-danger text-dark"><i class="far fa-trash-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
               
              </div>
            </div>
          </div> -->
                        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bình luận sản phẩm</button>
                </li>
               
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Người bình luận</th>
                      <th>Nội dung</th>
                      <th>Ngày đăng</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>nguyen duy sang</td>
                      <td>bass mon du an 1</td>
                      <td>25-03-2025</td>
                      <td>
                        <div class="btn-group">
                          <a href=""><button class="btn btn-outline-primary text-dark"><i class="far fa-eye"></i></button></a>
                          <a href=""><button class="btn btn-outline-danger text-dark"><i class="far fa-trash-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>nguyen duy sang</td>
                      <td>bass mon du an 1</td>
                      <td>25-03-2025</td>
                      <td>
                        <div class="btn-group">
                          <a href=""><button class="btn btn-outline-primary text-dark"><i class="far fa-eye"></i></button></a>
                          <a href=""><button class="btn btn-outline-danger text-dark"><i class="far fa-trash-alt"></i></button></a>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
                </div>
                
              </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
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

</body>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</html>
