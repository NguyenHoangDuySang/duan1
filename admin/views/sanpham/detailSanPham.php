
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
       
          <div class="col-12">
            <hr>
            <h2>Bình luận sản phẩm</h2>
            <div>
            <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>STT</th>
                   <th>Người bình luận</th>
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
                   <td> <a target="_blank" href="<?=BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>"><?= $binhLuan['ho_ten'] ?></a></td>
                   <td> <?= $binhLuan['noi_dung'] ?></td>
                   <td> <?= $binhLuan['ngay_dang'] ?></td>
                   <td> <?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Bị ẩn' ?></td>
                      
                   <td>
                    
                    <form action="<?=BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                        <input  type="hidden" name="name_view" value="detail_sanpham">
              
                        <button onclick="return confirm('Bạn có muốn ẩn bình luận này không ? ')" class="btn btn-outline-danger text-dark"><?=$binhLuan['trang_thai'] == 1 ?'Ẩn':'Hiện' ?></button>
                    </form>
                    
                   
        
                    
                   </td>
                  </tr>
                  
                  <?php endforeach ?>
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
