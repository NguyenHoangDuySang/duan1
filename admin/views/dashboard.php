<!doctype html>
    <html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | NN Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />

        <!-- CSS -->
        <?php require_once "layouts/libs_css.php"; ?>
    </head>

    <body>
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- HEADER -->
            <?php
            require_once "layouts/header.php";
            require_once "layouts/siderbar.php";
            ?>

            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- Main content -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="h-100">
                                    <div class="row mb-3 pb-1">
                                        <div class="col-12">
                                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-16 mb-1">Chào buổi sáng, Admin!</h4>
                                                    <p class="text-muted mb-0">Đây là thống kê cửa hàng của bạn hôm nay.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Tổng doanh thu -->
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Doanh Thu</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <?php echo number_format($totalRevenue, 0, ',', '.') ?> VNĐ
                                                            </h4>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
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
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Đơn Hàng</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <?php echo number_format($totalOrders) ?>
                                                            </h4>
                                              
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
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
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Thành Công</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <?php echo number_format($completedOrders) ?>
                                                            </h4>
                                                  
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
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
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách Hàng</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <?php echo number_format($countUniqueBuyers ?? 0) ?>
                                                            </h4>

                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                                <i class="bx bx-user-circle text-primary"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Bị Hủy</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                                <?php echo number_format($completedOrdersCancelled) ?>
                                                            </h4>
                                                      
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                                <i class="bx bx-check-circle text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Sản phẩm nổi bật</h4>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-hover table-centered align-middle table-nowrap mb-3">
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
                                                                    <!-- <?php var_dump($product['anh_san_pham']); ?> -->
                                                                    <tr>
                                                                        <td><?= $index + 1 ?></td>
                                                                        <td>
                                                                            <img src="<?= BASE_URL .  $product['anh_san_pham'] ?>" alt="" srcset="" width="50px" height="50px">
                                                                        </td>
                                                                        <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                                                                        <td><?= number_format($product['gia_ban'], 0, ',', '.') ?>  VNĐ</td>
                                                                        <td><?= $product['total_sold'] ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- // hiển thị nút phân trang -->
                                            <div class="pagination " style="display: flex; justify-content: center;" id="pagination"></div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Astore
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Astore
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        </div>

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?php require_once "layouts/libs_js.php"; ?>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rows = document.querySelectorAll("tbody tr");
            const paginationDiv = document.getElementById("pagination");
            const productsPerPage = 5; // Số sản phẩm mỗi trang
            const totalPages = Math.ceil(rows.length / productsPerPage); // Tính tổng số trang
            let currentPage = 1; // Trang hiện tại bắt đầu từ 1
            const maxPageButtons = 5; // Số nút trang tối đa hiển thị

            // Hàm hiển thị các sản phẩm theo trang
            function showPage(page) {
                const start = (page - 1) * productsPerPage;
                const end = page * productsPerPage;

                rows.forEach((row, index) => {
                    if (index >= start && index < end) {
                        row.style.display = ""; // Hiển thị sản phẩm trong phạm vi trang
                    } else {
                        row.style.display = "none"; // Ẩn các sản phẩm không thuộc trang này
                    }
                });
            }

            // Hàm tạo các nút phân trang
            function createPagination() {
                paginationDiv.innerHTML = ""; // Xóa các nút phân trang cũ

                // Nút "Previous"
                const prevButton = document.createElement("a");
                prevButton.classList.add("page-link");
                prevButton.href = "#";
                prevButton.innerText = "Trước";
                prevButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        showPage(currentPage);
                        createPagination();
                    }
                });
                paginationDiv.appendChild(prevButton);

                // Tính toán phạm vi các trang cần hiển thị
                let startPage = Math.max(currentPage - Math.floor(maxPageButtons / 2), 1);
                let endPage = Math.min(startPage + maxPageButtons - 1, totalPages);

                // Điều chỉnh startPage nếu không đủ số trang
                if (endPage - startPage < maxPageButtons - 1) {
                    startPage = Math.max(endPage - maxPageButtons + 1, 1);
                }

                // Các nút trang
                for (let i = startPage; i <= endPage; i++) {
                    const pageButton = document.createElement("a");
                    pageButton.classList.add("page-link");
                    pageButton.href = "#";
                    pageButton.innerText = i;
                    if (i === currentPage) {
                        pageButton.classList.add("active"); // Thêm lớp active cho trang hiện tại
                    }
                    pageButton.addEventListener("click", function(event) {
                        event.preventDefault();
                        currentPage = i;
                        showPage(currentPage);
                        createPagination();
                    });
                    paginationDiv.appendChild(pageButton);
                }

                // Nút "Next"
                const nextButton = document.createElement("a");
                nextButton.classList.add("page-link");
                nextButton.href = "#";
                nextButton.innerText = "Sau";
                nextButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        showPage(currentPage);
                        createPagination();
                    }
                });
                paginationDiv.appendChild(nextButton);
            }

            // Gọi hàm để hiển thị trang đầu tiên và tạo các nút phân trang
            showPage(currentPage);
            createPagination();
        });
    </script>

    </html>