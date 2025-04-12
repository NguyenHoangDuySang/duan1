<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Main content -->
<div class="content-wrapper">
  <style>
    .card.card-animate {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        background: linear-gradient(135deg, #ffffff, #f8f9fa);
    }

    .card.card-animate:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .card .text-uppercase {
        font-size: 13px;
        color: #6c757d;
        letter-spacing: 1px;
    }

    .card h4 {
        font-size: 28px;
        font-weight: 700;
        color: #212529;
    }

    .avatar-title {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50px;
        width: 50px;
        font-size: 24px;
        border-radius: 50%;
        background-color: #e9ecef;
    }

    .bg-success-subtle { background-color: #d1f5e1 !important; }
    .bg-info-subtle { background-color: #d1ecf1 !important; }
    .bg-warning-subtle { background-color: #fff3cd !important; }
    .bg-primary-subtle { background-color: #cfe2ff !important; }

    .table-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        padding: 15px;
    }

    .table th {
        color: #495057;
        background-color: #f1f3f5;
        font-weight: 600;
    }

    .table td {
        vertical-align: middle;
    }

    @media (max-width: 768px) {
        .card h4 {
            font-size: 20px;
        }
    }
  </style>

  <!-- Dashboard Overview Cards -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row g-4 mb-4">
        <!-- Tổng doanh thu -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-animate">
            <div class="card-body">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Doanh Thu</p>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <h4 class="mb-4"><?php echo number_format($totalRevenue, 0, ',', '.') ?> VNĐ</h4>
                <div class="avatar-sm">
                  <span class="avatar-title bg-success-subtle rounded fs-3">
                    <i class="bx bx-dollar-circle text-success"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tổng đơn hàng -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-animate">
            <div class="card-body">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Đơn Hàng</p>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <h4 class="mb-4"><?php echo number_format($totalOrders) ?></h4>
                <div class="avatar-sm">
                  <span class="avatar-title bg-info-subtle rounded fs-3">
                    <i class="bx bx-shopping-bag text-info"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Đơn hàng thành công -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-animate">
            <div class="card-body">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Thành Công</p>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <h4 class="mb-4"><?php echo number_format($completedOrders) ?></h4>
                <div class="avatar-sm">
                  <span class="avatar-title bg-warning-subtle rounded fs-3">
                    <i class="bx bx-check-circle text-warning"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Khách hàng -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-animate">
            <div class="card-body">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách Hàng</p>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <h4 class="mb-4"><?php echo number_format($countUniqueBuyers ?? 0) ?></h4>
                <div class="avatar-sm">
                  <span class="avatar-title bg-primary-subtle rounded fs-3">
                    <i class="bx bx-user-circle text-primary"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Đơn hàng bị hủy -->
        <div class="col-xl-3 col-md-6">
          <div class="card card-animate">
            <div class="card-body">
              <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Bị Hủy</p>
              <div class="d-flex align-items-end justify-content-between mt-4">
                <h4 class="mb-4"><?php echo number_format($completedOrdersCancelled) ?></h4>
                <div class="avatar-sm">
                  <span class="avatar-title bg-warning-subtle rounded fs-3">
                    <i class="bx bx-x-circle text-danger"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bảng sản phẩm nổi bật -->
      <div class="card shadow">
        <div class="card-header">
          <h4 class="mb-0">Sản phẩm bán chạy</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive table-card">
            <table class="table table-hover text-center align-middle mb-0">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Ảnh sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá bán</th>
                  <th>Số lượng</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($topProducts as $index => $product): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><img src="<?= BASE_URL . $product['hinh_anh'] ?>" width="50" height="50"></td>
                  <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                  <td><?= number_format($product['gia_san_pham'], 0, ',', '.') ?> VNĐ</td>
                  <td><?= $product['total_sold'] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="pagination mt-3" style="display: flex; justify-content: center;" id="pagination"></div>
      </div>
    </div>
  </section>
</div>

<!-- footer -->
<?php include './views/layout/footer.php'; ?>
